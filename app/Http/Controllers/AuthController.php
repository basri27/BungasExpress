<?php

namespace App\Http\Controllers;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function registerSave(Request $request) {
        Request()->validate([
            'username' => 'unique:users,username',
            'no_hp' => 'numeric|digits_between:10,20',
            'nama' => "regex:/^[a-zA-Z.,'Ññ\s]+$/",
            'password' => 'min:8|confirmed',
        ]);
    }

    public function loginAction(Request $request) {
        if(!Auth::attempt($request->only('username', 'password'))) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect('dashboard');
    }
}
