<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Http\Request;

class ApiKelasController extends Controller
{
    public function getKelasCount()
    {
        return Kelas::where('is_deleted', 0)->count();
    }

    public static function getAllKelas()
    {
        return DB::table('class')->get();
    }
}