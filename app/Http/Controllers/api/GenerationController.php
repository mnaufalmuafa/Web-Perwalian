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
}
