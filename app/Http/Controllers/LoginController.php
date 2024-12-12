<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|digits:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birthdate = $request->birthdate;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect()->route('MyProfileLogin')->with(key: 'success', value: 'User created successfully');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|email',
            'birthdate' => 'nullable|date',
            'phone_number' => 'nullable|digits:12',
        ]);

        $user = User::findOrFail($id);
        $user->update(array_filter([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'phone_number' => $request->input('phone_number'),
        ]));

        return redirect()->route('Home')->with(key: 'success', value: 'Update Succesfully');
    }

    public function login(Request $request)
    {
        Session::put('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' =>  $request->password
        ];

        if (Auth::attempt($infologin)) {
            Session::put('name', Auth::user()->name);
        
            return redirect()->route('Home')->with('success', 'Welcome to Furryna');
        } else {
            return back()->with('error', 'Wrong email or password');
        }        
    }

    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('Account/MyProfile')->with('success', 'You have logout');
    }
}
