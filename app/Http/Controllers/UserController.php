<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        $all_users = User::all();
        return view('pages/admin/users')->with('all_users', $all_users);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|min:6|max:25',
            'password' => 'min:8|max:50|nullable',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'account_type' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($request->id);

        if ($request->password !== null) {
            $user->password = $request->password;
        }

        DB::beginTransaction();
        try {
            $user->username = $request->username;
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->account_type = $request->account_type;
            $user->is_active = $request->is_active;
            $user->save();
            DB::commit();
            return redirect()->back()->with('success', 'User changes saved.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. User changes not saved.']);
        }
    }

    public function delete($user_id)
    {
        $user = User::find($user_id);
        DB::beginTransaction();
        try {
            $user->is_active = 0;
            $user->save();
            DB::commit();
            return redirect()->back()->with('success', 'User deactivated.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. User status not changed.']);
        }
    }

    public function single($user_id)
    {
        $user = User::find($user_id);
        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }
}
