<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function showClassroom($masterFolderId, $masterFolderName)
    {
        return view('subFolder', [
            'iMasterBookId' => $masterFolderId,
            'iMasterBookName' => $masterFolderName,
        ]);
    }

    public function showSubFolderData(string $SubFolderId, string $SubFolderName)
    {

        return view('classRoomData', [
            'SubFolderId' => $SubFolderId,
            'SubFolderName' => $SubFolderName,
        ]);
    }
    

    


}
