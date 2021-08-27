<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function download(Request $request)
    {
        
        
        $file = public_path()."/download/info.pdf";
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, 'filename.pdf', $headers);
    }
}
