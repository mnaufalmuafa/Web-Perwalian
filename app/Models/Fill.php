<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fill extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'fill';
    public $timestamps = true;

    public static function store($data)
    {
        $fill = new Fill;
        $fill->id = Fill::count() + 1;
        $fill->lecturer_id = $data["lecturer_id"];
        $fill->form_id = $data["form_id"];
        $fill->form_answer_id = $data["form_answer_id"];
        $fill->class_id = $data["class_id"];
        $fill->school_year_id = $data["school_year_id"];
        $fill->semester = $data["semester"];
        $fill->save();
    }
}
