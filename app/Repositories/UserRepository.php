<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserRepository
{
	private $model;

	public function __construct(User $model) {
		$this->model = $model;
	}

	public function getAll() {
		return $this->model->all();
	}

    public function get($id) {
        return User::find($id);
    }

    public function register($request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => ['required', Password::defaults()]
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->back()->withSuccess('User successfully created!');
    }

    public function update($request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => ['required', Password::defaults()]
        ]);
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->back()->withSuccess('User successfully created!');
    }

    public function delete($id) {
        return User::destroy($id);
    }
}
