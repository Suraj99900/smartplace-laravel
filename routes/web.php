<?php

use App\Http\Controllers\SessionManagerController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\UserController;
use App\Models\SessionManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CFunctionController;
use Illuminate\Support\Facades\Session;
Route::get('/', function () {
    return view('MyPortfolio');
});

Route::get('/searchBook',function () {
    return view('searchBook');
});

Route::get('/renderBlog',function () {
    return view('renderBlog');
});

Route::get('MyAbout',function(){
    return view('MyAbout');
});
Route::get('loginScreen',function(){
    return view('loginScreen');
});

Route::get('registrationForm',function(){
    return view('registrationForm');
});

Route::get('updateBlog/{id}',function($id){
    $sessionData = Session::all();
    if ((new SessionManager())->isLoggedIn()) {
        return view('updateBlog')->with('sessionData', $sessionData)->with('id',$id);
    }else{
        return view('loginScreen');
    }
});

Route::get('userDashboard',function(){
    $sessionData = Session::all(); // Retrieve all session data

    if ((new SessionManager())->isLoggedIn()) {
        return view('userDashboard')->with('sessionData', $sessionData);
    } else {
        return view('loginScreen');
    }
});

Route::get("BlogManage",function(){

    $sessionData = Session::all();

    if ((new SessionManager())->isLoggedIn()) {
        return view('BlogManage')->with('sessionData', $sessionData);
    } else {
        return view('loginScreen');
    }
});

Route::get('addBlogPage',function(){
    $sessionData = Session::all();
    if ((new SessionManager())->isLoggedIn()) {
        return view('addBlogPage')->with('sessionData', $sessionData);
    }else{
        return view('loginScreen');
    }
});

Route::get('BlogPage/{id}',function($id){
    return view('BlogPage')->with('id', $id);
});

Route::get('logOutSession',[SessionManagerController::class,'destroySession']);

Route::post('addUser',[UserController::class,'addUser']);
Route::get('login',[UserController::class,'login']);
Route::post('setSession',[SessionManagerController::class,'setUserSession']);
Route::get('fetchAllPosts', [BlogController::class, 'fetchAllBlogs']);
Route::get('userSymptoms', [SymptomController::class, 'index']);
Route::get('searchBookData',[CFunctionController::class, 'searchBook']);
Route::get('user/{id}',[UserController::class,'fetchUserById']);
Route::POST('addBlogPost',[BlogController::class,'addBlogPost']);
Route::get('fetchPostById/{id}',[BlogController::class,'fetchPostById']);
Route::put('updatePost/{id}',[BlogController::class,'updatePost']);
Route::delete('deletePost/{id}',[BlogController::class,'deletePost']);