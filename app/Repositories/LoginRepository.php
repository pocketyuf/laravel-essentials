<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginRepository
{
    /**
     * Login the user.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool {
        $user = User::where('email', $email)->first();

        if(!$user || !Hash::check($password, $user->password))
            throw ValidationException::withMessages(['email' => ['Invalid credential.']]);

        Auth::login($user);
        return true;
    }

    /**
     * Logout the user.
     *
     * @return void
     */
    public function logout() {
        Auth::logout();
    }
}
