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
        $subForms = DB::table('sub_form')
                        ->join('form', 'sub_form.form_id', '=', 'form.id')
                        ->where('form.sequence', $sequence)
                        ->where('sub_form.is_deleted', 0)
                        ->select(
                            'sub_form.id',
                            'sub_form.name',
                            'sub_form.sequence'
                        )
                        ->orderBy('sub_form.sequence')
                        ->get();

        foreach ($subForms as $subForm) {
            $subForm->question = Question::getQuestionBySubForm($subForm->id);
        }

        return $subForms;
    }

    private static function getQuestionBySubForm($subFormId)
    {
        $questions = DB::table('question')
                            ->where('is_deleted', 0)
                            ->where('sub_form_id', $subFormId)
                            ->orderBy('sequence')
                            ->get();
        $arrQuestion = [];
        foreach($questions as $question) {

            $questionData = [
                "id" => $question->id,
                "sequence" => $question->sequence,
                "question_type" => $question->question_type_id,
            ];

            if ($questionData["question_type"] == 5) { // short answer
                $tableName = "question_short_answer";
                $questionId = $question->id;
                $questionData["title"] = Question::getTextQuestionColumn($tableName, $questionId, "title");
                $questionData["hint"] = Question::getTextQuestionColumn($tableName, $question->id, "hint");
            }
            else if ($questionData["question_type"] == 6) { // long answer
                $tableName = "question_long_answer";
                $questionId = $question->id;
                $questionData["title"] = Question::getTextQuestionColumn($tableName, $questionId, "title");
                $questionData["hint"] = Question::getTextQuestionColumn($tableName, $question->id, "hint");
            }

            array_push($arrQuestion, $questionData);
        }

        return $arrQuestion;
    }

    private static function getTextQuestionColumn(String $table, int $id, String $column)
    {
        return DB::table($table)->where('id', $id)->pluck($column)[0];
    }
}
