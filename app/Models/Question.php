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

    public static function getQuestionBySubForm($subFormId)
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

            if ($questionData["question_type"] == 3) { // short answer
                $tableName = "question_upload_file";
                $questionId = $question->id;
                $questionData["title"] = Question::getTextQuestionColumn($tableName, $questionId, "title");
            }
            else if ($questionData["question_type"] == 5) { // short answer
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
