<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return redirect()->back()->with('error', 'Incorrect email!');
        }

        if($user->role != User::CUSTOMER) {
            return redirect()->back()->with('error', 'Login as customer!');
        }

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect()->back()->with('error', 'Incorrect password!');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::CUSTOMER
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful');
    }

    public function sellerRegistrationForm()
    {
        return view('auth.seller-register');
    }

    public function sellerRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'shop_name' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|confirmed',
            'image' => 'nullable|image|mimes:jpg,png',
        ]);

        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['password'] = Hash::make($request->password);
        $userData['role'] = User::SELLER;

        $user = User::create($userData);

        $sellerData['user_id'] = $user->id;
        $sellerData['name'] = $request->shop_name;
        $sellerData['phone'] = $request->phone;
        $sellerData['address'] = $request->address;

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images/sellers'), $imageName);
        $sellerData['image'] = 'images/sellers/'. $imageName;

        $seller = Seller::create($sellerData);

        $user->seller_id = $seller->id;
        $user->save();

        return redirect()->route('home')->with('success', 'Registration successful');
    }
}
