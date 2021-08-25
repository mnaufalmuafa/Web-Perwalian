<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function getDosenForInputClassPage()
    {
        return Dosen::
                    where('is_deleted', 0)
                    ->orderBy('lecturer_code', 'asc')
                    ->select('id', 'lecturer_code')
                    ->get();
    }

    public function getDosenForDataDosenPage()
    {
        return Dosen::
                    orderBy('lecturer.lecturer_code', 'asc')
                    ->leftJoin('class', 'class.homeroom_id', '=', 'lecturer.id')
                    ->select(
                        'lecturer.id', 
                        'lecturer.lecturer_code', 
                        'lecturer.is_deleted', 
                        'class.name', 
                        'class.is_deleted as is_deleted_class'
                    )
                    ->get();
    }

    public function deleteDosen(Request $request)
    {
        $dosen = Dosen::find($request->id);
        $dosen->is_deleted = 1;
        $dosen->save();
        Kelas::where('homeroom_id', $request->id)->update(['homeroom_id' => null]);
    }

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

        $dosen = Dosen::find($request->id);
        $dosen->lecturer_code = $request->lecturer_code;
        $dosen->save();
        return response()->json(true);
    }

    public function getDosenForDataKelasPage()
    {
        return Dosen::where('is_deleted', 0)->select('id', 'lecturer_code')->get();
    }

    public function getDosenForFormPage()
    {
        return Dosen::
                    orderBy('lecturer_code', 'asc')
                    ->get();
    }
}
