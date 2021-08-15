<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerText extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = "answer_text";
    public $timestamps = false;

    public static function store($questionId, $text)
    {
        $at = new AnswerText;
        $at->id = $questionId;
        $at->answer = $text;
        $at->save();
    }
}
