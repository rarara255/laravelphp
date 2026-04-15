<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function __construct(private UserService $userService){}
    public function create()
    {
        return View::make('register');
    }
    public function store(StoreUserRequest $request){
        $validated = $request->validated();
        $user = $this->userService->createUser($validated);
        dd($user);
        return Redirect::route('successRegister')-with('success', 'Пользователь успешно зарегисттрирован!');
    }
}
