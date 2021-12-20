<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function check(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|
                            min:8|
                            regex:/[A-Z]/|     
                            regex:/[0-9]/|    
                            regex:/[@$!%*#?&]/'
        ]);

        $userInfo = User::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','El correo ingresado no existe');
        } else {
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('RoleUser', $userInfo->role_id);
                $request->session()->put('EmailUser', $userInfo->email);
                return redirect('/');
            }else {
                return back()->with('fail','Password incorrecto');
            }
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            session()->pull('RoleUser');
            session()->pull('EmailUser');
            return redirect('auth/login');
        }
    }
}
