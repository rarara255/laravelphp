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
    public function CreateEditor(){
        $user = new User();
        $user->name = 'editor';
        $user->email = 'test2@gmail.com';
        $user->password = Hash::make('editor');
        $user->role = 'editor';
        $user->save();
    }
    public function registerUser(array $data)
    {
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            return $user;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
