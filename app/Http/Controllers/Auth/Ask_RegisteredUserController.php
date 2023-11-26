<?php

namespace App\Http\Controllers\Auth;

use App\Events\AskRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AskRegistrationRequest;
use App\Mail\ask_register;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class Ask_RegisteredUserController extends Controller
{
    //
    public function create(): View
    {
        return view('auth.ask_register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(AskRegistrationRequest $request)
    {
        //une valeur de type UploadsFile ne peut pas être dispatché dans
        //un event utilisant ShouldQueue, il faut le stocker quelque part et le recupérer
        //là où on en a besoin
        $askRegistration = $request->except('image');
        $image = Storage::disk('public')->put('ImageAskRegistration',$request->image);
        AskRegisterEvent::dispatch($askRegistration,$image);
        return redirect('login');
    }
}
