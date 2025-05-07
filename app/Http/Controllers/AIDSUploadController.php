<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Models\AIDSUpload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class AIDSUploadController extends Controller
{
    public function addUploadData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'semester' => 'required',
            'file' => 'required|file|max:100000', // Adjust the max file size if needed
            'user_name' => 'required',
            'file_type' => 'required',
        ]);

        $iIsbn = $request->input('isbn', '');
        $sName = $request->input('name', '');
        $iSemester = $request->input('semester', '');
        $sDescription = $request->input('description', '');
        $iFileType = $request->input('file_type', '');
        $sUserName = $request->input('user_name', '');
        $dSubmissionDate = $request->input('submission_date', '');
        $dSubmissionDate = $dSubmissionDate != '' ? date($dSubmissionDate) : '';

        try {
            // Get the uploaded file
            $uploadedFile = $request->file('file');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $originalFileName = $sName . "uploads" . date('Y-m-d_H-i-s') . "_" . $originalFileName;
            // Move the file to the 'resources/uploads' directory
            $destinationPath = resource_path('uploads');
            $file = move_uploaded_file($uploadedFile->getRealPath(), $destinationPath . '/' . $originalFileName);

            $fileRecord = new AIDSUpload();
            $fileRecord->name = $sName;
            $fileRecord->isbn = $iIsbn;
            $fileRecord->semester = $iSemester;
            $fileRecord->user_name = $sUserName;
            $fileRecord->file_type = $iFileType;
            $fileRecord->description = $sDescription;
            $fileRecord->file_name = $originalFileName;
            $dSubmissionDate != '' ? $fileRecord->submission_date = $dSubmissionDate : '';
            $fileRecord->added_on = date('Y-m-d H:i:s'); // Use Laravel's now() function to get the current date and time
            $fileRecord->file_path = url('uploads/' . $originalFileName);

            if ($fileRecord->save()) {
                return response()->json([
                    'message' => 'File uploaded successfully',
                    'status_code' => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Internal server error occurred.',
                'status_code' => 500
            ], 500);
        }
    }

    public function getUploadedBook(Request $request)
    {
        $name = $request->input('name', '');
        $search = $request->input('search', '');
        $iSBN = $request->input('isbn', '');
        $iTypeId = $request->input('typeId', '');
        $iSemester = $request->input('semester', '');
        $dFromDate = $request->input('fromDate', '');
        $dToDate = $request->input('dToDate', '');
        $iLimit = $request->input('limit', 10);
        $iPage = $request->input('page', 1);
        // Adjust the end date to include the entire day
        if ($dToDate) {
            $dToDate = date("Y-m-d", strtotime($dToDate . "+1 day"));
        }

        try {
            DB::enableQueryLog();
            $query = AIDSUpload::select('student_semester.semester as sem', 'staff_upload.*')
                ->leftJoin('student_semester', 'staff_upload.semester', '=', 'student_semester.id')
                ->where('staff_upload.deleted', 0)
                ->where('staff_upload.status', 1)
                ->where('student_semester.deleted', 0)
                ->where('student_semester.status', 1)
                ->orderBy('added_on', 'DESC');

            if ($name !== '' && $name !== null) {
                
                $query->where('staff_upload.name', 'like', '%' . $name . '%');
            }
            if ($search !== '') {
                
                $query->where('staff_upload.name', 'like', '%' . $search . '%');
            }

            if ($iSemester !== '' && $iSemester !== null) {
                
                $query->where('staff_upload.semester', $iSemester);
            }

            if ($iSBN !== '' && $iSBN !== null) {
                
                $query->where('staff_upload.isbn', $iSBN);
            }
            if ($search !== '' && $search !== null) {
                
                $query->orWhere('staff_upload.isbn', $search);
            }
            if ($iTypeId !== '' && $iTypeId > 0) {
                $query->where('staff_upload.file_type', $iTypeId);
            }
            if (($dFromDate !== '' && $dFromDate !== null ) &&( $dToDate !== '' && $dToDate !== null)) {
                $query->whereRaw('staff_upload.added_on between ? AND ?', [$dFromDate, $dToDate]);
            }

            $result = $query->paginate($iLimit);

            return response()->json([
                'message' => 'Ok',
                'body' => $result,
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            echo $e;
            return response()->json([
                'message' => 'Internal server error occurred.',
                'status_code' => 500
            ], 500);
        }
    }

    public function downloadFile(Request $request)
    {
        try {
            $request->validate([
                'url' => 'required',
            ]);

            $fileName = $request->input('url', '');

            // Define the path to the directory where files are stored
            $directory = resource_path('uploads/' . $fileName); // Adjust this to match your file storage directory

            if (File::exists($directory)) {
                $response = new BinaryFileResponse($directory);

                // Set headers using the headers property
                $response->headers->set('Content-Type', 'application/pdf');
                $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

                return $response;
            } else {
                return response()->json([
                    'message' => 'File not found.',
                    'status_code' => 404
                ], 404);
            }
        } catch (\Exception $e) {
            // Handle exceptions here, e.g., log the error or return an error response
            return response()->json([
                'message' => 'An error occurred while processing the request.',
                'status_code' => 500
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $book = AIDSUpload::findOrFail($id);
            $book->update(['deleted' => 1]); // Set the 'deleted' flag to 1 (or any appropriate value) for soft deletion.
            return response()->json(['message' => 'Book deleted successfully', 'status_code' => 200]);
        } catch (ModelNotFoundException $e) {
            // Handle "Model not found" exception (record not found)
            return response()->json(['message' => 'Book not found', 'status_code' => 404], 404);
        } catch (QueryException $e) {
            // Handle database query exceptions
            return response()->json(['message' => 'Failed to delete the book', 'status_code' => 500], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['message' => 'An error occurred', 'status_code' => 500], 500);
        }
    }
}
