<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpdatedController extends Controller
{
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $imageRequest = '';

        if(!$request->image){
            $imageRequest = $user->images;
        }else{
            $imageRequest = $request->image->store('Userimages','public');
        }

        $HashPassword = [
            'matricule' => $request->matricule,
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'lastname' => $request->lastname,
            'speciality' => $request->speciality,
            'admin' => $request->admin,
            'images' => $imageRequest
        ];

        if($request->password){
            $HashPassword = array_merge($HashPassword,['password' => $request->password]);
        }

        $user->update($HashPassword);
        $users = User::all();

        return view('dashboard',compact('users'));
    }
}
