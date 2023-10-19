<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'matricule' => ['required', 'string', 'max:15'],
            'speciality' => ['required', 'string', 'max:100'],
            'image' => ['required'],
            'admin' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $image = $request->image->store('Userimages');


        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'matricule' => $request->matricule,
            'speciality' => $request->speciality,
            'images' => $image,
            'admin' => $request->admin,
            'password' => Hash::make($request->password),
        ]);

        

        event(new Registered($user));

        return redirect('/dashboard');
    }
}
