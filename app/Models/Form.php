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
}
