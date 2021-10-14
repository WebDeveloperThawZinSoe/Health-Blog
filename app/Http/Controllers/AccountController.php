<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function show(Request $request){
        $users = User::all();
        return view("admin.all_user",[
            "users" => $users,
        ]);
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return back()->with('success','Account delete successfully!');
    }
    public function create(Request $request){
        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

      
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return back()->with('success','Account created successfully!');
    
    }
}
