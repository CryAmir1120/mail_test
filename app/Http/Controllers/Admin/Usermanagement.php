<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class Usermanagement extends Controller
{
    public function index()
    {
        $user_list = User::all();
        return view('Admin/users', compact('user_list'));
    }
    public function create()
    {
        return view('Admin.add_users');
    }
    public function store(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|email|unique:users',
            ],
            [
                'email.required' => 'please type your email',
                'email.email' => 'please type correct email',
                'email.unique' => 'The email address exist',
            ]
        );
        $email = $req->email;
        $pwd = $req->password;
        $new_user = User::create([
            'email' => $email,
            'password' => Hash::make($pwd)
        ]);
        return redirect()->route('admin.user.manage');
    }
    public function destroy(Request $req)
    {
        User::where('id', $req->id)->delete();
        return redirect()->route('admin.user.manage');
    }

    public function sendMail(Request $req)
    {
        $mail = $req->email;
        Mail::to($mail)->send(new TestMail());
    }
}
