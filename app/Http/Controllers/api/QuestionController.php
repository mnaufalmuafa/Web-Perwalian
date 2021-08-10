<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getFormQuestion(Request $request)
    {
        return Question::getFormQuestion($request->sequence);
    }
}
