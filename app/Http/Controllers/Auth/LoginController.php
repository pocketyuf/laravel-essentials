<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository) {
        $this->loginRepository = $loginRepository;
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm() {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $this->loginRepository->login($request->email, $request->password);
            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => $e->getMessage()]);
        }
    }

    /**
     * Handle a logout request to the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        $this->loginRepository->logout();
        return redirect()->route('login');
    }
}
