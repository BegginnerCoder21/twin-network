<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();

        return view('dashboard',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::findOrFail($id);

        // return view('admin.show',compact('user'));

        dd('view édité');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);

        return view('admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'matricule' => ['required', 'string', 'max:15'],
            'speciality' => ['required', 'string', 'max:100'],
            'admin' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
        
        $user = User::findOrFail($id);

        $imageRequest = '';

        if(!$request->image){
            $imageRequest = $user->images;
        }else{
            $imageRequest = $request->image->store('images');
        }

        $user->update([
            'matricule' => $request->matricule,
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->email,
            'speciality' => $request->speciality,
            'admin' => $request->admin,
            'images' => $imageRequest,
            'password' => Hash::make($request->password),
        ]);
        $users = User::all();

        return view('dashboard',compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/dashboard');
    }
}
