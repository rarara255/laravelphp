<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function createAdmin(){
        $this->authService->CreateEditor();
    }


    public function showRegister()
    {
        return view('register.login');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = $this->authService->registerUser($data);
        Auth::login($user);
        Session::flash('success','Welcome');
        return Redirect::route('dashboard');
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>['required'],
            'password'=>['required']
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return Redirect::route('dashboard');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('login')->with('success', 'Вы вышли из системы');
    }
    public function showDashboard()
    {
        return view('dashboard');
    }
}
