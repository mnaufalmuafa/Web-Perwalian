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
}
