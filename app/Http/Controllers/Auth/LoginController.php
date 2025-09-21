<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials, (bool) $request->rememberme)) {
            throw ValidationException::withMessages([
                'email' => 'Acesso inválido...'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('painel.events.index'));
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
