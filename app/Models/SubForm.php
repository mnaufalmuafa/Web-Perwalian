<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubForm extends Model
{
    use HasFactory;

    public static function getFormQuestion($sequence)
    {
        $subForms = DB::table('sub_form')
                        ->join('form', 'sub_form.form_id', '=', 'form.id')
                        ->where('form.sequence', $sequence)
                        ->where('sub_form.is_deleted', 0)
                        ->select(
                            'sub_form.id',
                            'sub_form.name',
                            'sub_form.sequence',
                            'sub_form.min_generation_id',
                            'sub_form.max_generation_id',
                        )
                        ->orderBy('sub_form.sequence')
                        ->get();

        foreach ($subForms as $subForm) {
            $subForm->question = Question::getQuestionBySubForm($subForm->id);
        }

        return $subForms;
    }
}
