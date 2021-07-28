<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class ApiKelasController extends Controller
{
    public function getKelasCount()
    {
        return Kelas::count();
    }
}