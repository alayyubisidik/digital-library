<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function showLogin() {
        return view('auth.login');
    }

    function submitLogin(Request $request) {

        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required' 
        ]);

        $user = User::where('username', $request->username)->first();
        // dd($request->all());
        if($user){
            if (password_verify($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                
                if($user->role === 'admin'){
                    return redirect('/dashboard-admin');
                }else if($user->role === 'member'){
                    return redirect('/dashboard-member');
                }else if($user->role === 'officer'){
                    return redirect('/dashboard-officer');
                }
            }
        }
        return redirect()->back()->with('message-error', 'Username or password is incorrect');
    }

    // public function login(Request $request){

    //     if($request->isMethod('get')){
    //         return view('auth.login');
    //     }else{
        
    //         if($request->isMethod('get')){
    //             return view('auth.login');
    //         }else{
    //             $request->validate([
    //                 'username' => 'required|string',
    //                 'password' => 'required|string',
    //             ]);
        
    //             $user = User::where('username', $request->input('username'))->first();
        
    //             if (!$user) {
    //                 return redirect('/login')->with('message-error', 'Username or password incorrect');
    //             }
            
    //             if (!Hash::check($request->input('password'), $user->password)) {
    //                 return redirect('/login')->with('message-error', 'Username or password incorrect');
    //             }
    
    //             if(!$user->access_status){
    //                 return redirect('/login')->with('message-error', 'Your account has not been approved');
    //             }
    
    //             $request->session()->put('id', $user->id);
    //             $request->session()->put('role', $user->role);
    //             $request->session()->put('username', $user->username);

    //             if($user->role === 'admin'){
    //                 return redirect('/dashboard-admin');
    //             }else if($user->role === 'member'){
    //                 return redirect('/dashboard-member');
    //             }else if($user->role === 'officer'){
    //                 return redirect('/dashboard-officer');
    //             }
    //         }
    //     }
    // }

    public function register (Request $request){

        if($request->isMethod('get')){
            return view('auth.register');
        }else{

            $request->validate([
                'fullname' => 'required|string|min:3|max:255',
                'username' => 'required|string|min:3|unique:users,username',
                'password' => 'required|string|min:6',
                'email' => 'required|string|unique:users,email',
                'address' => 'required|string',
            ]);

            User::create([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
            ]);
    
            return redirect('/login');      
        }
    }

    public function logout(Request $request){

        Auth::logout();
        return redirect('/');
    }

}
