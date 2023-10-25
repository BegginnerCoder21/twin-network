<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListEtudiantController extends Controller
{
    public function __invoke()
    {
        return view('etudiantlist');
    }
}
