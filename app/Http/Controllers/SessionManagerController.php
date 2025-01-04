<?php

namespace App\Http\Controllers;

use App\Models\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionManagerController extends Controller
{
    /**
     * Handles user login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setUserSession(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'username'=>'required',
            'password'=>'required',
            'login'=>'required'
        ]);
        $aSessionData = array();
        $aSessionData['id'] = $request->input('id','');
        $aSessionData['username'] = $request->input('username','');
        $aSessionData['phoneNumber'] = $request->input('phoneNumber','');
        $aSessionData['password'] = $request->input('password','');
        $aSessionData['login'] = $request->input('login','');

        if ($aSessionData['login'] == 1 ) {
            $oSessionManager = new SessionManager();
            $oSessionManager->fSetSessionData($aSessionData);
            return response()->json(['success' => true,'iStaffId' => $oSessionManager->iUserID,'message'=>'ok']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid login credentials']);
    }

    /**
     * Sets user session data.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setSessionData(Request $request)
    {
        $data = $request->all();

        // Store all session data
        foreach ($data as $key => $value) {
            Session::put($key, $value);
        }

        return response()->json(['message' => 'Session data stored successfully', 'data' => $data]);
    }

    /**
     * Sets admin session data.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setAdminSessionData(Request $request)
    {
        $data = $request->all();

        // Store admin-specific session data
        foreach ($data as $key => $value) {
            Session::put($key, $value);
        }

        return response()->json(['message' => 'Admin session data stored successfully', 'data' => $data]);
    }

    public function destroySession(Request $request){
        $oSessionObject = new SessionManager();
        $oSessionObject->destroySession();
        return response()->json(['success' => true,'message'=>'ok']);
    }
}
