<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules\Password;

class SignupController extends Controller
{
    public function create() : View {
        return view('blog.signup');
    }
// abcdefghijklmnopqrstuvwxyz
    public function store(Request $request) : RedirectResponse {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:authors|alpha',
            'email' => 'required|email:dns|unique:authors',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        
        // 'password' => [ 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        // Illuminate\Validation\Rules\Password;

        $validatedData['username'] = '@' . $validatedData['username'];
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        Author::create($validatedData);

        return redirect(route('login'))
                ->with('success_signup', 'Signup successfull! Please login here!');
    }
}
