<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
class LoginController extends Controller
{
    function login(){
        return view('layout.login');
    }
    public function dologin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('home');
        }else{
            return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');}
        
    }

    public function logout(Request $request)
{
      Auth::guard('admin')->logout();
      return redirect('login');
}
    public function home()
    {

      return view('home');
    }

}
