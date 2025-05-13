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
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('users.index')->withSuccess('User successfully created!');
    }

    public function update($request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id . '|max:255',
            'password' => ['nullable', Password::defaults()]
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password'))
            $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')->withSuccess('User successfully updated!');
    }

    public function delete($id) {
        User::destroy($id);
        return redirect()->route('users.index')->withSuccess('User successfully deleted!');
    }
}
