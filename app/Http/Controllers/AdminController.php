<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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

    public function storeDosen(Request $request)
    {
        return view('pages.admin.input_dosen');
    }

    public function editDosen(Request $request)
    {
        return view('pages.admin.edit_dosen');
    }

    public function kelas(Request $request)
    {
        return view('pages.admin.kelas');
    }

    public function storeKelas(Request $request)
    {
        return view('pages.admin.input_kelas');
    }

    public function editKelas(Request $request)
    {
        return view('pages.admin.edit_kelas');
    }

    public function mahasiswa(Request $request)
    {
        return view('pages.admin.mahasiswa');
    }

    public function storeMahasiswa(Request $request)
    {
        return view('pages.admin.input_mahasiswa');
    }

    // API
    public function getAllAdmin()
    {
        return Admin::get();
    }

    public function getCheckLoginAdmin(Request $request)
    {
        $result = Admin::
                    where("username", "=", $request->username)
                    ->where("password", "=", $request->password)
                    ->count();
        return json_encode($result > 0);
    }
}
