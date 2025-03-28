<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryMain;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function register(Request $request){
        if ($request->isMethod('get')) {

            return view('signin.index');
        }


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        $user->remember_token = Str::random(64);
        $user->save();

        Mail::to($request->email)
                ->send(new RegisterMail($user));

        return redirect()->route('registered', ['id' => $user->id])
            ->with('status', 'Registration successful! Please login.');
    }

    public function login(Request $request){
        if($request->isMethod('get')){
            return view('login.index');
        }


        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors(['email' => 'User not found.'])->withInput();
        }

        if(!$user->email_verified_at){
            return back()->withErrors(['email' => 'Verify your email first!'])->withInput();
        }

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);



        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();

    }

    public function registered($id){

        $user = User::findOrFail($id);

        return view('signin.registered', compact('user'));
    }


    public function verify($id){
        $user = User::where('remember_token', $id)->first();

        if ($user->email_verified_at) {
            return redirect()->route('login')->with('status', 'Email is already verified.');
        }

        $user->update(['email_verified_at' => now()]);


        return redirect()->route('verified')->with('success', 'Email verified successfully! You can now log in.');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }

    public function forget(){
        return view('login.forget');
    }

    public function recovery($token){
        $user = User::where('remember_token', $token)->first();

        return view('login.recovery', compact('user'));

    }

    public function send_recovery_link(Request $request){
        $email = $request->email;
        $user = User::where('email', $email)->first();
        Mail::to($user->email)
                ->send(new RecoveryMain($user));

        return redirect()->route('sent');
    }

    public function changepassword(Request $request, $user){
        $user->password = $request->password;
        $user->save();

        return redirect()->route('dashboard', compact('user'));

    }


}
