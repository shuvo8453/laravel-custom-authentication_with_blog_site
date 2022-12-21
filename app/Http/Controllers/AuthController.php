<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials)
            ?  redirect()->intended('index')->withSuccess('You have successfully login')
            : redirect("login")->withSuccess('Errors! You have invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("index")->withSuccess("Great! You have successfully logged in");
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }

        return redirect('login')->withSuccess('Oops! You do not have access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
