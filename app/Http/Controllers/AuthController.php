<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view("auth.login");
    }
    public function showRegister()
    {
        return view("auth.register");
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
                dd($fields);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $rank = new Rank();
            $rank->save();
            Auth::login($user);
             $user->createToken('myapptoken')->plainTextToken;
    return  redirect(route("index"));
        
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'email' =>'required',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            dd("loi");
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check email
        $user = User::where('email', $request['email'])->first();

        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            dd("loi");

            return redirect()->route('login')->with('error','Tài khoản hoặc mật khẩu không chính xác');
        }
         $user->createToken('myapptoken', ['user_name'=> $user->name])->plainTextToken;
         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
            dd(Auth::user());
            return redirect()->route('index')->with('success', 'Login successful!');
        }
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
