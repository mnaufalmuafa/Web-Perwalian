<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        return view('pages.admin.login_admin');
    }

    public function index(Request $request)
    {
        return view('pages.admin.dashboard_admin');
    }

    public function dashboard(Request $request)
    {
        return view('pages.admin.dashboard_admin');
    }

    public function dosen(Request $request)
    {
        return view('pages.admin.dosen');
    }

    public function inputDosen(Request $request)
    {
        return view('pages.admin.input_dosen');
    }

    public function updateDosen(Request $request)
    {
        $data = [
            "id" => $request->get('id'),
            "lecturer_code" => Dosen::
                                        where("id", $request->get('id'))
                                        ->select('lecturer_code')
                                        ->first()
                                        ->lecturer_code
        ];
        return view('pages.admin.update_dosen', $data);
    }

    public function kelas(Request $request)
    {
        return view('pages.admin.kelas');
    }

    public function inputKelas(Request $request)
    {
        return view('pages.admin.input_kelas');
    }

    public function updateKelas(Request $request)
    {
        $data = [
            "id" => $request->get('id'),
            "class" => Kelas::
                            where("id", $request->get('id'))
                            ->select('name', 'generation_id', 'homeroom_id')
                            ->first()
        ];
        if ($data["class"]->generation_id == null) {
            $data["class"]->generation_id = 0;
        }
        if ($data["class"]->homeroom_id == null) {
            $data["class"]->homeroom_id = 0;
        }
        return view('pages.admin.update_kelas', $data);
    }

    public function mahasiswa(Request $request)
    {
        return view('pages.admin.mahasiswa');
    }

    public function inputMahasiswa(Request $request)
    {
        return view('pages.admin.input_mahasiswa');
    }

    public function updateMahasiswa(Request $request)
    {
        $data = [
            "id" => $request->id,
            "name" => Mahasiswa::getNameById($request->id),
            "nim" => Mahasiswa::getNimById($request->id),
            "status" => Mahasiswa::getStatusById($request->id),
            "class_id" => Mahasiswa::getClassIdById($request->id) == null ? 0 : Mahasiswa::getClassIdById($request->id),
        ];
        // dd($data);
        return view('pages.admin.update_mahasiswa', $data);
    }

    public function editPassword()
    {
        return view('pages.change_password');
    }
}
