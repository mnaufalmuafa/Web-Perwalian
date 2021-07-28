<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ApiAdminController extends Controller
{
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
