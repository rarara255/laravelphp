<?php
namespace App\Services;
use App\Models\User;

class UserService
{
    public function createUser(array $data)
    {
        try {
            $user = new User();
            $user->email = $data['email'];
            $user->password = \Illuminate\Support\Facades\Hash::make($data['password']);
            return $user;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
