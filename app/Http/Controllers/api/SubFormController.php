<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SubForm;
use Illuminate\Http\Request;

class SubFormController extends Controller
{
    public function getFormQuestion(Request $request)
    {
        return SubForm::getFormQuestion($request->sequence);
    }
}
