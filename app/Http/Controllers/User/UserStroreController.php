<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserStroreController extends Controller
{
    public function store(UserRequest $request)
    {

        $image = $request->image->store('Userimages','public');
        $formatNumber = '+225 ' . $request->number;


        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'number' => $formatNumber,
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
