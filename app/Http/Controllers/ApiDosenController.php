<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class ApiDosenController extends Controller
{
    public static function getDosenCount()
    {
        return Dosen::where('is_deleted', 0)->count();
    }

    public static function getAllDosen()
    {
        return Dosen::get();
    }

    public function storeDosen(Request $request) {
        $allDosenLC = Dosen::where('is_deleted', 0)->pluck('lecturer_code');

        foreach ($allDosenLC as $lecturer_code) {
            if ($lecturer_code == $request->lecturer_code) {
                return response()->json(false);
            }
        }
        $dosen = new Dosen;
        $dosen->id = Dosen::count() + 1;
        $dosen->lecturer_code = $request->lecturer_code;
        $dosen->save();
        return response()->json(true);
    }

    public function editDosen(Request $request)
    {
        $allDosenLC = Dosen::where('is_deleted', 0)->pluck('lecturer_code');

        foreach ($allDosenLC as $lecturer_code) {
            if ($lecturer_code == $request->lecturer_code) {
                return response()->json(false);
            }
        }

        $dosen =    Dosen::find($request->id);
        $dosen->lecturer_code = $request->lecturer_code;
        $dosen->save();
        return response()->json(true);
    }

    public function deleteDosen(Request $request)
    {
        $dosen = Dosen::find($request->id);
        $dosen->is_deleted = 1;
        $dosen->save();
    }

    public function getDosenForDataKelasPage()
    {
        return Dosen::where('is_deleted', 0)->select('id', 'lecturer_code')->get();
    }
}
