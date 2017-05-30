<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
    	$validator = Validator::make($request->input(), [
                'username' => 'required',
                'password' => 'required|min:6',
            ]);

        if ($validator->fails()) {
            if (count($validator->errors()) <= 1) {
                return response()->json(['status' => 'exception','response' => $validator->errors()->first()]);
            } else {
                return response()->json(['status' => 'exception','response' => 'All fields are required']);
            }
        }

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return response()->json(['status' => 'success','response' => Auth::user()]);
        } else {
            return response()->json(['status' => 'exception', 'response' => "Invalid Credentials."]);
        }
    }
}
