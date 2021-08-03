<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getCheckLoginAdmin(Request $request)
    {
        $result = Admin::
                    where("username", "=", $request->username)
                    ->where("password", "=", $request->password)
                    ->count();
        if ($result > 0) {
            session(['is_admin_login' => 1]);
        }
        return json_encode($result > 0);
    }
    
    public function logout()
    {
        session(['is_admin_login' => 0]);
    }
}
