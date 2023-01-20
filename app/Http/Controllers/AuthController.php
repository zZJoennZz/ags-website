<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;

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

        return $this->authenticated($request, $user, "admin/dashboard");
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'username' => 'required|min:6|max:25',
            'password' => 'required|min:8|max:50',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'account_type' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        DB::beginTransaction();
        try {
            $newUser = new User();
            $newUser->username = $request->username;
            $newUser->password = $request->password;
            $newUser->first_name = $request->first_name;
            $newUser->last_name = $request->last_name;
            $newUser->account_type = $request->account_type;
            $newUser->email = $request->email;
            $newUser->save();

            DB::commit();
            return redirect()->back()->with('success', 'User saved successfully.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. User is not saved.']);
        }
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
