<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChooseUserController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.choose_user');
    }
}
