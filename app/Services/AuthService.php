<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
}
