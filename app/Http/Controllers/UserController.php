<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
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

    public function list(){
        
        return view('etudiantlist');
    }
    public function index()
    {
    //     INSERT INTO `users` (`id`, `matricule`, `name`, `lastname`, `email`, `speciality`, `images`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	// (6, '21-ESATIC0107AA', 'test édité', 'tester', 'test@gmail.com', 'Developpeur', 'Userimages/RB99vxZPcYQaqsFl0MZmbzDeXKofQtOqfBTXkwAm.jpg', NULL, '$2y$10$ccUpo/RougAuQ8fLlpaoY.pWcFqyEtlgMsJyGCMoinapo1yYHJ1du', 0, NULL, '2023-10-19 13:52:35', '2023-10-19 14:17:25'),
	// (7, '21-ESATIC0197RZ', 'test3', 'tester3', 'test3@gmail.com', 'Developpeur font-end', 'Userimages/Tqf9afnDGgHwEzS5BKWd73K1TTZMhlsXRlx1SsFn.jpg', NULL, '$2y$10$.PzVfTbaSYoB9LGlkXfC0.GJK9WUxAD7MRPmFPuoqnT6mhlxkcGpa', 1, NULL, '2023-10-19 13:53:52', '2023-10-19 13:53:52'),
	// (8, '20-ESATIC384GT', 'test2', 'tester2', 'test2@gmail.com', 'Developpeur backend', 'Userimages/vmGoU8wQTZVlfPIAZgMlTqa7kWtY1S0lajzFTs0s.jpg', NULL, '$2y$10$vBckbHX7jT938Ydat/tP4.K7rX3myoYqQHxSvA5b/UJ5IaTjGDoXO', 1, NULL, '2023-10-19 14:08:42', '2023-10-19 14:08:42'),
	// (9, '19-ESATIC384GK', 'test4', 'tester4', 'test4@gmail.com', 'manager', 'Userimages/8iKte6OIh9SOI32XI3iNiC4PHW7pJVyeHkWMB6fL.jpg', NULL, '$2y$10$iVB4rNlwbN0bb.vhawXdjOnLHKj5jL7A86FCeGhLh87.nLJ3J9b9u', 0, NULL, '2023-10-19 14:11:31', '2023-10-19 14:11:31'),
	// (10, '21-ESATIC0197RZ', 'test5', 'tester5', 'test5@gmail.com', 'hacker', 'Userimages/Dl8K1r6QSPj23hNpgJkKonvRKmhvMUrpLSHuecOa.jpg', NULL, '$2y$10$rkSGrx4UWpTN/qeDY1ZL8un8bvVuIbLLaanyT.6woa/Ra..nx2Zcm', 0, NULL, '2023-10-19 14:18:05', '2023-10-19 14:18:05');
	// (11, '21-ESATIC7187RZ', 'test6', 'tester6', 'test6@gmail.com', 'manager', 'Userimages/Dl8K1r6QSPj23hNpgJkKonvRKmhvMUrpLSHuecOa.jpg', NULL, '$2y$10$rkSGrx4UWpTN/qeDY1ZL8un8bvVuIbLLaanyT.6woa/Ra..nx2Zcm', 0, NULL, '2023-10-19 14:18:05', '2023-10-19 14:18:05');
	// (12, '21-ESATIC7187RZ', 'test7', 'tester7', 'test7@gmail.com', 'testeur', 'Userimages/Dl8K1r6QSPj23hNpgJkKonvRKmhvMUrpLSHuecOa.jpg', NULL, '$2y$10$rkSGrx4UWpTN/qeDY1ZL8un8bvVuIbLLaanyT.6woa/Ra..nx2Zcm', 0, NULL, '2023-10-19 14:18:05', '2023-10-19 14:18:05');

        $users = User::latest()->get();

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
        
        $image = $request->image->store('Userimages','public');
        
        
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
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $imageRequest = '';
        
        if(!$request->image){
            $imageRequest = $user->images;
        }else{
            $imageRequest = $request->image->store('images');
        }

        $HashPassword = [
            'matricule' => $request->matricule,
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->email,
            'speciality' => $request->speciality,
            'admin' => $request->admin,
            'images' => $imageRequest
        ];

        if($request->password){
            $HashPassword = array_merge($HashPassword,['password' => $request->password]);
        }

        $users = User::all();
        $user->update($HashPassword);

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
