<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function CreateAdmin(){
        $user = new User();
        $user->name = 'admin';
        $user->email = 'test1@gmail.com';
        $user->password = Hash::make('admin');
        $user->role = 'admin';
        $user->save();
    }
    public function CreateEditor(){
        $user = new User();
        $user->name = 'editor';
        $user->email = 'test2@gmail.com';
        $user->password = Hash::make('editor');
        $user->role = 'editor';
        $user->save();
    }
    public function CreateMember(){
        $user = new User();
        $user->name = 'member';
        $user->email = 'test3@gmail.com';
        $user->password = Hash::make('member');
        $user->role = 'member';
        $user->save();
    }
    public function registerUser(array $data): User
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = User::ROLE_MEMBER;
        $user->save();
        return $user;
    }
    public function attemptLogin(array $credentials): bool{
        return Auth::attempt($credentials);
    }
}
