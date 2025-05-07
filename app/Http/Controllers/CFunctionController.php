<?php
namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CFunctionController extends Controller
{

    public function searchBook(Request $request)
    {
        $sName = $request->input('keyword', 'general');

        try {
            // Make the HTTP request using Laravel's HTTP client
            $response = Http::acceptJson()
                ->withHeaders([
                    'User-Agent' => 'Laravel-Http-Request',
                ])
                ->timeout(10) // Set a reasonable timeout
                ->get('https://booksearch.arcom.uz/api/book/search', [
                    'keyword' => $sName
                ]);

            // Check if the response status is not 200
            if ($response->failed()) {
                return response()->json([
                    'success' => false,
                    'error' => 'HTTP Error: ' . $response->status(),
                ]);
            }

            // Decode the response
            $decodedResponse = $response->json();

            // Return the data as JSON
            return response()->json([
                'success' => true,
                'data' => $decodedResponse,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }

    }

    public function getAllSemester(Request $request)
    {
        try {
            $oSemester = Semester::where("status", 1)
                                 ->where("deleted", 0)
                                 ->get();
        } catch (\Exception $e) {
            echo $e;die;
            return response()->json([
                'message' => 'Internal server error occurred.',
                'status_code' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'OK',
            'data' => $oSemester,
            'status_code' => 200
        ], 200);
    }

}
