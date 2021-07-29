<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Generation extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'generation';
    public $timestamps = false;

    public static function getGenerationById($id)
    {
        $result = DB::table('generation')->where('id', $id)->pluck('generation');
        if ($result->count() == 0) {
            return null;
        }
        return $result[0];
    }
}
