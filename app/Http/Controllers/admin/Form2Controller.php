<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Form2Controller extends Controller
{
    public function index()
    {
        return view('pages.dosen.form2');
    }
}
