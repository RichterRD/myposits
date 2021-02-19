<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login()
    {
        return Inertia::render('Login');
    }
    public function access(Request $request)
    {
        $user = $request->user;
        $password = $request->password;

        $user_data = User::where('user', $user)->get();

        if (count($user_data) > 0) {
            if (Hash::check($password, $user_data[0]->password)) {

                session(['user' => $user_data[0]->user]);
                session(['name' => $user_data[0]->name]);
                session(['role_id' => $user_data[0]->role_id]);

                return 'SUCCESS';
            } else {
                return 'ERROR';
            }
        } else {
            return 'ERROR';
        }
    }
    public function verify_user(Request $request)
    {
        $user = $request->user;

        $user_exists = User::where('user', $user)->select('id')->get();

        if (count($user_exists) == 0) {
            return 'NOT EXISTS';
        } else {
            return 'EXISTS';
        }
    }
    public function register_user(Request $request)
    {
        $user = $request->user_r1;
        $password = $request->password_r1;
        $password = Hash::make($password);
        $role_id = 2; //Default role is user

        User::create(array('user' => $user, 'name' => $user, 'password' => $password, 'role_id' => $role_id));

        return redirect()->route('login');
    }
    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
