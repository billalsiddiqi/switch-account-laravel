<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;



class SwitchUserController extends Controller
{
    public function index() {
        return view('switch');
    }

    public function store(Request $request) {
        if (Auth::guard('admin')->check()){
            $admin = Auth::guard('admin')->user();
            if(Hash::check($request->password, $admin->password)){
                $user = User::create([
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'password' => $admin->password,
                ]);
                event(new Registered($user));
                Auth::guard('admin')->logout();
                Admin::where('id', $admin->id)->delete();

                return redirect('/login');
            }else {
                return redirect()->back()->with('message', 'Password Wrong!');
            }

        } else {
            $user = Auth::user();
            if(Hash::check($request->password, $user->password)){
                $admin = Admin::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                ]);
                event(new Registered($admin));
                Auth::logout();
                User::where('id', $user->id)->delete();

                return redirect('/admin-login');
            }else {
                return redirect()->back()->with('message', 'Password Wrong!');
            }
        }
    }
}
