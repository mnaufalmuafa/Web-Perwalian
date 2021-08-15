<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'answer_question';
    public $timestamps = false;

    public static function store($formAnswerId, $questionType, $sequence)
    {
        $aq = new AnswerQuestion;
        $aq->id = AnswerQuestion::count() + 1;
        $aqId = $aq->id;
        $aq->form_answer_id = $formAnswerId;
        $aq->question_type_id = $questionType;
        $aq->sequence = $sequence;
        $aq->save();
        return $aqId;
    }
}
