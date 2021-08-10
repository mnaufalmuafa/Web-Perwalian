<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    protected $table = "question";
    public $increminting = false;

    public static function getFormQuestion($sequence)
    {
        $questions = DB::table("question")
                            ->join('sub_form', 'question.sub_form_id', '=', 'sub_form.id')
                            ->join('form', 'sub_form.form_id', '=', 'form.id')
                            ->where('form.sequence', $sequence)
                            ->select(
                                'question.id',
                                'question.sequence',
                                'question.question_type_id'
                            )
                            ->addSelect(DB::raw('sub_form.id as sub_form_id'))
                            ->addSelect(DB::raw('sub_form.name as sub_form_name'))
                            ->get();
        
        foreach ($questions as $question) {
            $question->hint = "hint";
        }
        return $questions;
    }
}
