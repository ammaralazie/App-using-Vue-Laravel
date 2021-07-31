<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('api')->except(['signup','login']);

    }//end of constucter

    public function signup(Request $request)
    {

        //validate section
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        if ($valid->fails()) {
            return response()->json(
                [
                    'state' => 'error',
                    'msg' => $valid->errors()->first()
                ]
            );
        } //end of if

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response()->json(
            [
                'state' => 'success',
                'msg' => $user
            ]
        );
    } //end of sinup function

    public function login(Request $request)
    {
        //validate section
        $valid = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if ($valid->fails()) {
            return response()->json(
                [
                    'state' => 'error',
                    'msg' => $valid->errors()->first()
                ]
            );
        } //end of if

        $data=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        $token=Auth::guard('api')->attempt($data);
        if($token){
            return response()->json(
            [
                'state' => 'success',
                'token'=>$token,
                'msg'=>auth('api')->user()
                // 'msg' => auth()->user()
            ]);
    }else{
        return response()->json(
            [
                'state' => 'erorr',
                'token'=>null,
                'msg'=>'same things erorr'
                // 'msg' => auth()->user()
            ]);
    }

    } //end of login
}//end of UserController
