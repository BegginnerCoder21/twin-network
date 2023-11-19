<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListEtudiantController extends Controller
{

    public function index()
    {
        return view('etudiantlist');
    }
    public function twinnerslist()
    {

        $users = User::all();

        return response()->json([
            'twinners' => $users
        ]);
    }
}
