<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect()->route('login')->withErrors(trans('auth.failed'));
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user, "dashboard");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }

    protected function authenticated(Request $request, $user, string $page)
    {
        return redirect()->intended($page);
    }
}
