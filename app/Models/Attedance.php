<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attedance extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'attendance';
    public $timestamps = false;

    public static function store($studentId, $formAnswerId, $presence, $note)
    {
        $attendance = new Attedance;
        $attendance->id = Attedance::count() + 1;
        $attendance->student_id = $studentId;
        $attendance->form_answer_id = $formAnswerId;
        $attendance->presence = $presence == "Hadir" ? 1 : 0;
        $attendance->note = $note;
        $attendance->save();
    }
}
