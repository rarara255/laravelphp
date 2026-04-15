<?php
namespace App\Services;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $data)
    {
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            return $user;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
