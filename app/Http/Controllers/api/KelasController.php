<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function getDataForKelasDataPage()
    {
        return response()->json(Kelas::getDataForDataKelasPage());
    }

    public function getDataForInputMahasiswaPage()
    {
        return Kelas::select('id', 'name')->orderby('name', 'asc')->get();
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

    private static function getNameById($id)
    {
        return Kelas::where("id", $id)->pluck('name')[0];
    }

    public function editKelas(Request $request)
    {
        $allClassName = Kelas::where('is_deleted', 0)->pluck('name');

        $prevName = KelasController::getNameById($request->id);

        if ($prevName != $request->name) {
            foreach ($allClassName as $class_name) {
                if ($class_name == $request->name) {
                    return response()->json(false);
                }
            }
        }

        $kelas = Kelas::find($request->id);
        $kelas->name = $request->name;
        $kelas->generation_id = $request->generation_id == 0 ? null : $request->generation_id;
        $kelas->homeroom_id = $request->homeroom_id == 0 ? null : $request->homeroom_id;
        $kelas->save();
        return response()->json(true);
    }

    public function deleteKelas(Request $request)
    {
        $kelas = Kelas::find($request->id);
        $kelas->is_deleted = 1;
        $kelas->save();
        Mahasiswa::where('class_id', $request->id)->update(['class_id' => null]);
    }
}
