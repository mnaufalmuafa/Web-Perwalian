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
