<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function getMahasiswaCount()
    {
        return Mahasiswa::where('is_deleted', 0)->count();
    }
    
    public function getDataForDataMahasiswaPage()
    {
        $data = [];
        $dataMahasiswa = DB::table('student')->where('is_deleted', 0)->get();
        foreach ($dataMahasiswa as $mahasiswa) {
            array_push($data,[
                "id" => $mahasiswa->id,
                "name" => $mahasiswa->name,
                "nim" => $mahasiswa->nim,
                "status" => $mahasiswa->status,
                "class" => $mahasiswa->class_id == null ? null : Kelas::getNameByClassId($mahasiswa->class_id)
            ]);
        }
        return $data;
    }

    public function storeMahasiswa(Request $request) {
        $allMahasiswaNIM = Mahasiswa::where('is_deleted', 0)->pluck('nim');

        foreach ($allMahasiswaNIM as $nim) {
            if ($nim == $request->nim) {
                return response()->json(false);
            }
        }

        $mahasiswa = new Mahasiswa();
        $mahasiswa->id = Mahasiswa::count() + 1;
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->status = $request->status;
        $mahasiswa->class_id = $request->class_id == 0 ? null : $request->class_id;
        $mahasiswa->save();
        return response()->json(true);
    }

    public function editMahasiswa(Request $request) {
        $allMahasiswaNIM = Mahasiswa::where('is_deleted', 0)->pluck('nim');

        $prevNim = Mahasiswa::find($request->id)->nim;

        if ($prevNim != $request->nim) {
            foreach ($allMahasiswaNIM as $nim) {
                if ($nim == $request->nim) {
                    return response()->json(false);
                }
            }
        }

        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->status = $request->status;
        $mahasiswa->class_id = $request->class_id == 0 ? null : $request->class_id;
        $mahasiswa->save();
        return response()->json(true);
    }

    public function deleteMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->is_deleted = 1;
        $mahasiswa->save();
    }
}
