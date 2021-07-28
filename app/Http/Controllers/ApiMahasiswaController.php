<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ApiMahasiswaController extends Controller
{
    public function getMahasiswaCount()
    {
        return Mahasiswa::count();
    }
}
