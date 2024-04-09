<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('thanks');
    }

    public function favorite(Request $request, $id)
    {
        $user = Auth::user();
        $isFavorite = $user->favorites()->where('shop_id', $id)->count();

        if ($isFavorite == 0) {
            $user->favorites()->attach($id);
        }

        return redirect()->back();
    }

    public function unfavorite(Request $request, $id)
    {
        $user = Auth::user();
        $user->favorites()->detach($id);

        return redirect()->back();
    }
}