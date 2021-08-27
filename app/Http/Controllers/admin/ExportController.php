<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fill;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function download(Request $request)
    {
        $url = Fill::getRealDownloadURL($request->fill);
        $fileName = Fill::getAUFNameByFillId($request->fill);
        
        $file = public_path().$url;
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, $fileName, $headers);
        // return $fileName;
    }
}
