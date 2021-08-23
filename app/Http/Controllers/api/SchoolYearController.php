<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function getAllSchoolYear()
    {
        return SchoolYear::get();
    }

    public function getSchoolYearForDashboardAdmin()
    {
        return SchoolYear::getSchoolYearForDashboardAdmin();
    }
}
