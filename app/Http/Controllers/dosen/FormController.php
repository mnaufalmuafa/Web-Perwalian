<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form1()
    {
        $data = [
            "id" => Form::getId(1),
            "sequence" => 1,
            "title" => "Form 1",
            "form_name" => Form::getTitle(1),
        ];
        return view('pages.dosen.form', $data);
    }

    public function form2()
    {
        $data = [
            "id" => Form::getId(2),
            "sequence" => 2,
            "title" => "Form 2",
            "form_name" => Form::getTitle(2),
        ];
        return view('pages.dosen.form', $data);
    }

    public function form3()
    {
        $data = [
            "id" => Form::getId(3),
            "sequence" => 3,
            "title" => "Form 3",
            "form_name" => Form::getTitle(3),
        ];
        return view('pages.dosen.form', $data);
    }
}
