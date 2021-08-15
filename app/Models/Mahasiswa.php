<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'student';
    public $timestamps = false;

    public static function getNameById($id)
    {
        $student = Mahasiswa::find($id);
        return $student->name;
    }

    public static function getNimById($id)
    {
        $student = Mahasiswa::find($id);
        return $student->nim;
    }

    public static function getStatusById($id)
    {
        $student = Mahasiswa::find($id);
        return $student->status;
    }

    public static function getClassIdById($id)
    {
        $student = Mahasiswa::find($id);
        return $student->class_id;
    }

    public static function getIdByNIM($nim)
    {
        $student = Mahasiswa::where("nim", $nim)->pluck("id");
        return $student[0];
    }

    public static function getByClassId($classId)
    {
        return Mahasiswa::where('class_id', $classId)->get();
    }
}
