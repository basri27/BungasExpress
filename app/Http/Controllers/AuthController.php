<?php

namespace App\Http\Controllers;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function registerSave(Request $request) {
        // validator::make($request->all(), [

        // ])
    }
}
