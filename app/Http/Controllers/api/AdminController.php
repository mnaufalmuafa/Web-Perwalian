<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logout()
    {
        session(['is_admin_login' => 0]);
    }
}
