<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = ['email' => 'required|email', 'password' => 'required'];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validate->getMessageBag()->toArray(),
            ], 400);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['redirect' => '/'], 200);
        }

        return response()->json(['status' => 'error'], 403);
    }
}
