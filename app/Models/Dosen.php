<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'lecturer';
    public $timestamps = false;
}
