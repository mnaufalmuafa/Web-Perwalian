<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getCheckLoginAdmin(Request $request)
    {
        $result = Admin::first();
        $loginAccepted = $request->username == $result->username && Hash::check($request->password, $result->password);
        if ($loginAccepted) {
            session(['is_admin_login' => 1]);
        }
        return json_encode($loginAccepted);
    }

    public function isPasswordTrue(Request $request)
    {
        $result = Admin::first();
        return json_encode(Hash::check($request->password, $result->password));
    }

    public function changePassword(Request $request)
    {
        $admin = Admin::find(1);
        $admin->password = Hash::make($request->password);
        $admin->save();
    }
    
    public function logout()
    {
        session(['is_admin_login' => 0]);
    }
}
