<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('adminAuth.signin');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|exists:users',
            'password'=>'required'
        ]);
        $email=$request['email'];
        $password=$request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Validation is invalid');
        }
    }

    public function getNewUser()
    {
        $roles=Role::all();
        return view('adminAuth/new-user')->with(['roles'=>$roles]);
    }

    public function postNewUser(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'password'=>'required',
            'con_pass'=>'required'
        ]);

        $name=$request['name'];
        $email=$request['email'];
        $password=bcrypt($request['password']);
        if($request['password']==$request['con_pass'])
        {
            $user=new User();
            $user->name=$name;
            $user->email=$email;
            $user->password=$password;
            $user->syncRoles($request['role']);
            $user->save();
            return redirect()->back()->with('info','New User addition is successful');
        }else
        {
            return redirect()->back()->with('error','Authentication failed');
        }
//        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
