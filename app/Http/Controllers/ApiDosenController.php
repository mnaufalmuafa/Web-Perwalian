<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class ApiDosenController extends Controller
{
    public function getDosenCount()
    {
        return Dosen::count();
    }
}
