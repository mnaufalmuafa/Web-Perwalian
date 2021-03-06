<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'lecturer';
    public $timestamps = false;

    public static function getDosenCodeById($id)
    {
        $result = DB::table('lecturer')->where('id', $id)->pluck('lecturer_code');
        if ($result->count() == 0) {
            return null;
        }
        return $result[0];
    }
}
