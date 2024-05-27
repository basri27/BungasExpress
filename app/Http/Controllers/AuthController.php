<?php

namespace App\Http\Controllers;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
            'no_hp' => 'digits_between:10,20',
            'nama' => "regex:/^[a-zA-Z.,'Ññ\s]+$/",
            'password' => 'min:8',
            'password_confirmation' => 'same:password'
        ], [
            'username.unique' => 'Username (' . $request->username . ') sudah digunakan! Silahkan ganti username!',
            'no_hp.digits_between' => 'Nomor handphone tidak boleh kurang dari 10 digit dan tidak boleh lebih dari 20 digit!',
            'nama.regex' => 'Format nama yang Anda masukkan tidak valid atau tidak boleh mengandung angka!',
            'password.min' => 'Password minimal berjumlah 8 karakter!',
            'password_confirmation.same' => 'Password konfirmasi tidak sesuai dengan password!'
        ]);

        $data = $request->except('password_confirmation', 'password');
        $data['password'] = Hash::make($request->password);
        $data['role'] = "pelanggan";

        User::create($data);

        return redirect()->route('login');
    }

    public function loginAction(Request $request) {
        if(!Auth::attempt($request->only('username', 'password'))) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
