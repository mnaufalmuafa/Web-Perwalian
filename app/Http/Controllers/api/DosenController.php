<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function getDosenForInputClassPage()
    {
        return Dosen::
                    where('is_deleted', 0)
                    ->orderBy('lecturer_code', 'asc')
                    ->select('id', 'lecturer_code')
                    ->get();
    }
}
