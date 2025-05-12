<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Str;

class ConvertVideoToHLS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function handle(): void
    {
        $video = Video::find($this->video->id);

        if (!$video) {
            \Log::error("Video not found for ID: {$this->video->id}");
            return;
        }

        $lessonId = (string) Str::uuid();
        $outputFolder = "hls/{$lessonId}";
        $outputAbsolutePath = Storage::disk('public')->path($outputFolder);

        if (!is_dir($outputAbsolutePath)) {
            mkdir($outputAbsolutePath, 0775, true);
        }

        $videoAbsolutePath = Storage::disk('public')->path($video->path);
        $hlsFile = "{$outputAbsolutePath}/index.m3u8";
        $segmentPattern = "{$outputAbsolutePath}/segment%03d.ts";

        // 🔍 Detect watermark using Python script
        $detectCommand = [
            'python3',
            base_path('scripts/detect_watermark.py'),
            $videoAbsolutePath
        ];
        $process = new Process($detectCommand);
        $process->setTimeout(120);
        $process->run();

        $vf = 'scale=-2:720'; // fallback in case no watermark
        if ($process->isSuccessful()) {
            $output = json_decode($process->getOutput(), true);
            if (isset($output['x'], $output['y'], $output['w'], $output['h'])) {
                $vf = "delogo=x={$output['x']}:y={$output['y']}:w={$output['w']}:h={$output['h']},scale=-2:720";
            }
        } else {
            \Log::warning("Watermark detection failed: " . $process->getErrorOutput());
        }

        // 🧪 FFmpeg HLS conversion with optional delogo
        $ffmpegCommand = [
            'ffmpeg',
            '-i', $videoAbsolutePath,
            '-threads', '1',
            '-preset', 'superfast',
            '-tune', 'zerolatency',
            '-vf', $vf,
            '-codec:v', 'libx264',
            '-b:v', '1000k',
            '-maxrate', '1200k',
            '-bufsize', '2000k',
            '-crf', '25',
            '-g', '50',
            '-keyint_min', '50',
            '-codec:a', 'aac',
            '-b:a', '64k',
            '-ac', '1',
            '-hls_time', '15',
            '-hls_playlist_type', 'vod',
            '-hls_segment_filename', $segmentPattern,
            '-start_number', '0',
            '-movflags', '+faststart',
            $hlsFile
        ];

        $conversion = new Process($ffmpegCommand);
        $conversion->setTimeout(9600);

        try {
            $conversion->mustRun();

            $videoDuration = $this->getVideoDuration($videoAbsolutePath);

            $video->refresh();
            $video->update([
                'hls_path' => "{$outputFolder}/index.m3u8",
                'is_converted_hls_video' => true,
                'duration' => $videoDuration,
            ]);
        } catch (ProcessFailedException $e) {
            \Log::error("HLS Conversion Failed for Video ID: {$video->id}. Error: " . $e->getMessage());
        }
    }

    private function getVideoDuration($filePath)
    {
        try {
            $cmd = "ffmpeg -i " . escapeshellarg($filePath) . " 2>&1";
            $output = shell_exec($cmd);

            if (preg_match('/Duration: (\d+):(\d+):(\d+\.\d+)/', $output, $matches)) {
                $hours = (int) $matches[1];
                $minutes = (int) $matches[2];
                $seconds = (float) $matches[3];
                return ($hours * 3600) + ($minutes * 60) + $seconds;
            }

            return null;
        } catch (\Exception $e) {
            \Log::error("Error getting video duration: " . $e->getMessage());
            return null;
        }
    }
}
