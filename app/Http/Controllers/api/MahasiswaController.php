<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
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
}
