<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function getDataForKelasDataPage()
    {
        return response()->json(Kelas::getDataForDataKelasPage());
    }
}
