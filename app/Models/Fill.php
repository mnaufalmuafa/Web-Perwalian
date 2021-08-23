<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fill extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = 'fill';
    public $timestamps = true;

    public static function store($data)
    {
        $fill = new Fill;
        $fill->id = Fill::count() + 1;
        $fill->lecturer_id = $data["lecturer_id"];
        $fill->form_id = $data["form_id"];
        $fill->form_answer_id = $data["form_answer_id"];
        $fill->class_id = $data["class_id"];
        $fill->school_year_id = $data["school_year_id"];
        $fill->semester = $data["semester"];
        $fill->save();
    }

    public static function getDownloadURL($fillId)
    {
        $aqId = DB::table('fill')
                    ->join('form_answer', 'fill.form_answer_id', '=', 'form_answer.id')
                    ->join('answer_question', 'form_answer.id', '=', 'answer_question.id')
                    ->pluck('answer_question.id')[0];
        $file = DB::table('answer_upload_file')
                    ->where('id', $aqId)
                    ->first();
        return "http://127.0.0.1:8000/upload/bukti_perwalian/".$file->id."/".$file->file_name;
        // return $file;
    }

    public static function checkFillExist($lecturer_id, $form_id, $class_id, $school_year_id, $semester)
    {
        $qr = Fill::where('lecturer_id', $lecturer_id)
                    ->where('form_id', $form_id)
                    ->where('class_id', $class_id)
                    ->where('school_year_id', $school_year_id)
                    ->where('semester', $semester)
                    ->count();
        return response()->json($qr > 0);
    }

    public static function getStatus($lecturer_id, $form_id, $class_id, $sy_id, $semester)
    {
        $qr = Fill::where('lecturer_id', $lecturer_id)
                    ->where('form_id', $form_id)
                    ->where('class_id', $class_id)
                    ->where('school_year_id', $sy_id)
                    ->where('semester', $semester)
                    ->count();
        return $qr > 0 ? "Sudah Mengisi" : "Belum Mengisi";
    }

    public static function getIdByParam($lecturer_id, $form_id, $class_id, $sy_id, $semester)
    {
        return Fill::where('lecturer_id', $lecturer_id)
                    ->where('form_id', $form_id)
                    ->where('class_id', $class_id)
                    ->where('school_year_id', $sy_id)
                    ->where('semester', $semester)
                    ->pluck('id')[0];
    }

    public static function getCreatedAtById($id)
    {
        return Fill::where('id', $id)->pluck('created_at')[0];
    }
}
