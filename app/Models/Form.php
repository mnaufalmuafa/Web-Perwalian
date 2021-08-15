<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Form extends Model
{
    use HasFactory;

    protected $table = "form";
    public $increminting = false;

    public function getForm($sequence)
    {
        return DB::table($this->table)
                    ->join('sub_form', 'form.id', '=', 'sub_form.form_id')
                    ->where('sequence', $sequence);
    }

    public static function getTitle($sequence)
    {
        return DB::table("form")->where('sequence', $sequence)->pluck('name')[0];
    }

    public static function getId($sequence)
    {
        return DB::table("form")->where('sequence', $sequence)->pluck('id')[0];
    }
}
