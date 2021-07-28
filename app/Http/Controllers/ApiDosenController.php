<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class ApiDosenController extends Controller
{
    public static function getDosenCount()
    {
        return Dosen::count();
    }

    public function getAllDosen()
    {
        return Dosen::get();
    }

    public function storeDosen(Request $request) {
        $dosen = new Dosen;
        $dosen->id = ApiDosenController::getDosenCount() + 1;
        $dosen->lecturer_code = $request->lecturer_code;
        $dosen->save();
    }

    public function editDosen(Request $request)
    {
        $dosen =    Dosen::find($request->id);
        $dosen->lecturer_code = $request->lecturer_code;
        $dosen->save();
    }
}
