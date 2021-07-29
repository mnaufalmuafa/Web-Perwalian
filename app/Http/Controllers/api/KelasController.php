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

    public function storeKelas(Request $request) {
        $allClassName = Kelas::where('is_deleted', 0)->pluck('name');

        foreach ($allClassName as $class_name) {
            if ($class_name == $request->name) {
                return response()->json(false);
            }
        }

        $kelas = new Kelas;
        $kelas->id = Kelas::count() + 1;
        $kelas->name = $request->name;
        $kelas->generation_id = $request->generation_id == 0 ? null : $request->generation_id;
        $kelas->homeroom_id = $request->homeroom_id == 0 ? null : $request->homeroom_id;
        $kelas->save();
        return response()->json(true);
    }
}
