<?php

namespace App\Http\Controllers\api;

use App\Models\Generation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function getGenerationFordataKelasPage()
    {
        return Generation::get();
    }

    public function getGenerationForInputClassPage()
    {
        return Generation::where('is_deleted', 0)->select('id', 'generation')->get();
    }
}
