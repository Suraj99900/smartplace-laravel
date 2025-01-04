<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    Public function addUser(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'password'=> 'required',
            'secretCode'=>'required'
        ]);

        $name = $request->input('username', '');
        $password = $request->input('password', '');
        $type = $request->input('type', 1);
        $secretCode = $request->input('secretCode', '');

        // Check client code
        $oClient = (new Client());
        $oClientResult = $oClient->getClientByClientID($secretCode);
        if (!$oClientResult) {
            return response()->json(['error' => 'Wrong Code', 'status' => 500]);
        }

        if (empty($name) || empty($password) || empty($secretCode)) {
            return response()->json(['error' => 'Missing Parameters', 'status' => 500]);
        }

        $userManage = new User();
        $userManage->addUser(["name"=>$name, "password"=>$password, "user_type"=>$type]);

        return response()->json(['message' => 'User created successfully', 'status' => 200]);
    }

    Public function updateUser(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $password = $request->input('password');
        $type = $request->input('type');

        if (empty($id) || empty($name) || empty($password) || empty($type)) {
            return response()->json(['error' => 'Missing Parameters', 'status' => 500]);
        }

        $userManage = new \App\Classes\UserManage();
        $userManage->updateUser($id, $name, $password, $type);

        return response()->json(['message' => 'User updated successfully', 'status' => 200]);
    }

    Public function deleteUser(Request $request)
    {
        $id = $request->input('id');

        if (empty($id)) {
            return response()->json(['error' => 'Missing ID parameter', 'status' => 500]);
        }

        $userManage = new \App\Classes\UserManage();
        $userManage->deleteUser($id);

        return response()->json(['message' => 'User deleted successfully', 'status' => 200]);
    }

    Public function fetchAllUsers()
    {
        $userManage = new \App\Classes\UserManage();
        $users = $userManage->fetchAll();

        return response()->json($users);
    }

    Public function fetchUserById(Request $request, $id)
    {
        
        if (empty($id)) {
            return response()->json(['error' => 'Missing ID parameter', 'status' => 500]);
        }

        $userManage = (new User())->fetchById($id);
        return response()->json([
            'name' => $userManage->name,
            'type' => $userManage->user_type,
            'status' => 200,
        ]);
    }

    Public function login(Request $request)
    {
        $name = $request->input('name', '');
        $password = $request->input('password', '');

        $userManage = new User();
        $oResult = $userManage->login($name, $password);

        if ($oResult) {
            return response()->json([$oResult, 'status' => 200]);
        } else {
            return response()->json(['message' => 'Wrong username and password.', 'status' => 500]);
        }
    }

    Public function userSymptoms(Request $request)
    {
        $name = $request->input('name', '');
        $aNameData = fetchSymptoms($name);

        return response()->json([$aNameData, 'status' => 200]);
    }
}
