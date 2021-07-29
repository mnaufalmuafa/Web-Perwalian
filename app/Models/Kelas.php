<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'class';
    public $timestamps = false;

    public static function getDataForDataKelasPage()
    {
        $data = [];
        $dataKelas = DB::table('class')->get();
        foreach ($dataKelas as $kelas) {
            array_push($data,[
                "id" => $kelas->id,
                "name" => $kelas->name,
                "generation" => Generation::getGenerationById($kelas->generation_id),
                "dosen_wali" => Dosen::getDosenCodeById($kelas->homeroom_id),
                "is_deleted" => $kelas->is_deleted
            ]);
        }
        return $data;
    }

    public static function getNameByClassId($id)
    {
        return Kelas::where('id', $id)->first()->name;
    }
}
