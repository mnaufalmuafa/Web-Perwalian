<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'form_answer';
    public $timestamps = false;

    public static function storeNew()
    {
        $newId = FormAnswer::count() + 1;
        $formAnswer = new FormAnswer();
        $formAnswer->id =  $newId;
        $formAnswer->save();
        return $newId;
    }
}
