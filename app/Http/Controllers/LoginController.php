<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class LoginController extends Controller
{
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function login(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            return redirect()->route('dashboard')->with('message', 'Login Berhasil');
        }
        return redirect()->back()->withErrors(['message' => 'Identitas tersebut tidak cocok dengan data kami']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('form-login');
    }
}
