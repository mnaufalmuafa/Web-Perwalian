<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Kelas;
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

    public function deleteDosen(Request $request)
    {
        $dosen = Dosen::find($request->id);
        $dosen->is_deleted = 1;
        $dosen->save();
        Kelas::where('homeroom_id', $request->id)->update(['homeroom_id' => null]);
    }
}
