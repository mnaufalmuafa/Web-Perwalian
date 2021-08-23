<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'school_year';
    public $timestamps = false;

    public static function getFormattedTahunAjaran($id)
    {
        $ta = SchoolYear::select('first_year', 'second_year')->where('id', $id)->first();
        return $ta->first_year."/".$ta->second_year;
    }
}
