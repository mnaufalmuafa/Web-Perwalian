<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    // API
    // public function getAllAdmin()
    // {
    //     return Admin::get();
    // }
}
