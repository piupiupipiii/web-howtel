<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (! $user = User::find(['email' => $email, 'password' => $password])) {
            session()->flash('login_invalid');

            return response()->redirectToRoute('login.index');
        }

        auth()->login($user);

        return response()->redirectToIntended();
    }
}
