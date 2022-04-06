<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function registerForm() {
        return view('registration_form');
    }

    public function store(Request $request) {

        $request->validate(
            [
                'name'              =>      'required|string|max:20',
                'email'             =>      'required|email|unique:users,email',
                'password'          =>      'required|alpha_num|min:6',
                'confirmPassword'   =>      'required|same:password',
                
            ]
        );

        $dataArray      =       array(
            "name"          =>          $request->name,
            "email"         =>          $request->email,
            "password"      =>          $request->password
        );

        $user           =       User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Welcome, you have been successfully registered");
        }

        else {
            return back()->with("failed", "Warning! fail to register please check again the data");
        }
    }
}