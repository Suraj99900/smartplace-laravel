<?php
use App\Http\Controllers\AIDSBookIssueController;
use App\Http\Controllers\AidsBookManageController;
use App\Http\Controllers\AIDSSturntInfoController;
use App\Http\Controllers\AIDSUploadController;
use App\Http\Controllers\AttachmentFileController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\MasterFolderController;
use app\Http\Controllers\SemesterControllers;
use App\Http\Controllers\SessionManagerController;
use App\Http\Controllers\SubFolderController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use App\Models\SessionManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CFunctionController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\VideoController;

Route::get('/', function () {
    return view('MyPortfolio');
});

Route::get('/searchBook', function () {
    return view('searchBook');
});

Route::get('/renderBlog', function () {
    return view('renderBlog');
});

Route::get('MyAbout', function () {
    return view('MyAbout');
});
Route::get('loginScreen', function () {
    return view('loginScreen');
});

Route::get('registrationForm', function () {
    return view('registrationForm');
});

Route::get('updateBlog/{id}', function ($id) {
    $sessionData = Session::all();
    if ((new SessionManager())->isLoggedIn()) {
        return view('updateBlog')->with('sessionData', $sessionData)->with('id', $id);
    } else {
        return view('loginScreen');
    }
});

Route::get('userDashboard', function () {
    $sessionData = Session::all(); // Retrieve all session data

    if ((new SessionManager())->isLoggedIn()) {
        return view('userDashboard')->with('sessionData', $sessionData);
    } else {
        return view('loginScreen');
    }
});

Route::get("BlogManage", function () {

    $sessionData = Session::all();

    if ((new SessionManager())->isLoggedIn()) {
        return view('BlogManage')->with('sessionData', $sessionData);
    } else {
        return view('loginScreen');
    }
});

Route::get('addBlogPage', function () {
    $sessionData = Session::all();
    if ((new SessionManager())->isLoggedIn()) {
        return view('addBlogPage')->with('sessionData', $sessionData);
    } else {
        return view('loginScreen');
    }
});

Route::get('BlogPage/{id}', function ($id) {
    return view('BlogPage')->with('id', $id);
});

Route::get('logOutSession', [SessionManagerController::class, 'destroySession']);

Route::post('addUser', [UserController::class, 'addUser']);
Route::get('login', [UserController::class, 'login']);
Route::post('setSession', [SessionManagerController::class, 'setUserSession']);
Route::get('fetchAllPosts', [BlogController::class, 'fetchAllBlogs']);
Route::get('userSymptoms', [SymptomController::class, 'index']);
Route::get('searchBookData', [CFunctionController::class, 'searchBook']);

Route::get('/semester', [CFunctionController::class, 'getAllSemester']);


Route::get('classRoom', function () {
    return view('classRoom');
});
Route::get('user/{id}', [UserController::class, 'fetchUserById']);
Route::POST('addBlogPost', [BlogController::class, 'addBlogPost']);
Route::get('fetchPostById/{id}', [BlogController::class, 'fetchPostById']);
Route::put('updatePost/{id}', [BlogController::class, 'updatePost']);
Route::delete('deletePost/{id}', [BlogController::class, 'deletePost']);
Route::get('/subFolder/{masterFolderId}/{masterFolderName}', [ClassRoomController::class, 'showClassroom']);
Route::get('/classRoomData/{SubFolderId}/{SubFolderName}', [ClassRoomController::class, 'showSubFolderData']);

Route::get('LMS-Dashboard', function () {
    return view('LMS-Dashboard');
});

Route::get('home', function () {
    return view('home');
});
Route::get('uploadScreen', function () {
    return view('uploadScreen');
});
Route::get('uploadClassRoom', function () {
    return view('uploadClassRoom');
});
Route::get('uploadBook', function () {
    return view('uploadBook');
});
Route::get('uploadNotes', function () {
    return view('uploadNotes');
});
Route::get('uploadAssignment', function () {
    return view('uploadAssignment');
});
Route::get('folderManagement', function () {
    return view('folderManagement');
});



// Upload Session API
Route::controller(AIDSUploadController::class)->group(function () {
    Route::post('upload', 'addUploadData');
    Route::get('fetch/book', 'getUploadedBook');
    Route::delete('fetch/book/{id}', 'delete');
    Route::post('download', 'downloadFile');
});

// Student Info API
Route::controller(AIDSSturntInfoController::class)->group(function () {
    Route::post('student-info', 'addStudentInfo');
    Route::put('student-info', 'updateStudentByNameZPRN');
    Route::get('student-info', 'getStudentsInfo');
    Route::get('student-info/zprn', 'getStudentByNameZPRN');
    Route::delete('student-info/zprn', 'freezeStudent');
});

// Book Management Routes
Route::controller(AidsBookManageController::class)->group(function () {
    Route::post('books', 'add');
    Route::put('books/{id}', 'update');
    Route::get('books', 'fetch');
    Route::get('books/{id}', 'fetchById');
    Route::delete('books/{id}', 'delete');
});

// Book Issue Routes
Route::controller(AIDSBookIssueController::class)->group(function () {
    Route::get('book-issues', 'getAllBookIssues');
    Route::get('book-issues/{id}', 'getBookIssueById');
    Route::post('book-issues', 'addBookIssue');
    Route::put('book-issues/{id}', 'updateBookIssueById');
    Route::put('book-return/{id}', 'returnBookById');
    Route::delete('book-issues/{id}', 'deleteBookIssueById');
});

// Master Folder Routes
Route::controller(MasterFolderController::class)->group(function () {
    Route::get('folders', 'getAllFolders');
    Route::get('folders/{id}', 'getFolderById');
    Route::post('folders', 'createFolder');
    Route::put('folders/{id}', 'updateFolder');
    Route::put('folders/{id}/freeze', 'freezeFolder');
    Route::delete('folders/{id}', 'deleteFolder');
});

// Subfolders Routes
Route::controller(SubFolderController::class)->group(function () {
    Route::post('subfolders', 'createSubFolder');
    Route::get('subfolders/{id}', 'getSubFolderById');
    Route::get('subfolders/master/{masterFolderId}', 'getSubFoldersByMasterFolderId');
    Route::get('subfolders', 'getAllSubFolders');
    Route::delete('subfolders/{id}', 'deleteSubFolder');
    Route::put('subfolders/{id}/freeze', 'freezeSubFolder');
    Route::put('subfolders/{id}/unfreeze', 'unfreezeSubFolder');
});

// Upload Data Routes
Route::controller(UploadFileController::class)->group(function () {
    Route::post('upload-data', 'addUploadData');
    Route::get('upload-data', 'getAllData');
    Route::post('download-file', 'downloadFile');
});

// Excel Import/Export Routes
Route::controller(ExcelController::class)->group(function () {
    Route::post('export-students', 'exportStudents');
    Route::post('import-students', 'importStudents');
});


Route::get('/video-management', [VideoController::class, 'index']);

Route::get('/category-management', [VideoCategoryController::class, 'index']);



Route::get('videos/{categoryId?}', function () {
    $sessionManager = (new SessionManager());
    $categoryId = request()->route('categoryId');
    $userType = $sessionManager->iUserID;

    return view('video-list', compact('categoryId', 'userType'));
});


Route::get('videos/videos-player/{videoId}', function () {
    $videoId = request()->route('videoId');

    return view('video-player', compact('videoId'));
});


Route::get('home-video', function () {
    $sessionData = Session::all(); // Retrieve all session data

    if ((new SessionManager())->isLoggedIn()) {
        return view('home-video')->with('sessionData', $sessionData);
    } else {
        return view('login');
    }
});


// Video upload
Route::post('video', [VideoController::class, 'upload']);
Route::post('uploadChunk', [VideoController::class, 'uploadChunk']);
Route::get('video/{id}', [VideoController::class, 'fetchById']);
Route::get('videos-all', [VideoController::class, 'fetchAll']);
Route::get('videos-category/{id}', [VideoController::class, 'fetchAllVideoDataByCategoryId']);
Route::get('videos/paginated', [VideoController::class, 'fetchAllWithPagination']);
Route::get('videos/search', [VideoController::class, 'searchByTitle']);
Route::put('video/{id}', [VideoController::class, 'update']);
Route::delete('video/{id}', [VideoController::class, 'destroy']);
Route::get('stream/{id}', [VideoController::class, 'stream']);
Route::get('thumbnail/{id}', [VideoController::class, 'thumbnailImages']);

// Video Category
Route::post('video-category', [VideoCategoryController::class, 'addCategory']);
Route::get('video-categories', [VideoCategoryController::class, 'getAllCategories']);
Route::get('video-categories/{userId}/user', [VideoCategoryController::class, 'getUserCategoryAccess']);
Route::get('video-category/{id}', [VideoCategoryController::class, 'getCategoryById']);
Route::put('video-category/{id}', [VideoCategoryController::class, 'updateCategory']);
Route::delete('video-category/{id}', [VideoCategoryController::class, 'deleteCategory']);

// Attachment route
Route::post('app-attachment', [AttachmentFileController::class, 'addAttchmentData']);
Route::get('video/app-attachment/{id}', [AttachmentFileController::class, 'fetchAllAttachmentDataByVideoId']);
Route::delete('app-attachment/{id}', [AttachmentFileController::class, 'removedAttchment']);

// Video Comment 
Route::post('video/comment', [UserCommentController::class, 'addUserComment']);
Route::put('video/comment', [UserCommentController::class, 'updateUserComment']);
Route::get('video/comment/{id}', [UserCommentController::class, 'fetchUserCommentByVideoId']);
Route::get('video/comment', [UserCommentController::class, 'fetchAllUserComment']);
Route::delete('video/comment/{id}', [UserCommentController::class, 'invalidUserCommentById']);
