<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerUploadFile extends Model
{
    use HasFactory;

    public $increminting = false;
    protected $table = "answer_upload_file";
    public $timestamps = false;

    public static function store($questionId, $fileName, $uploadFolderNameId)
    {
        $auf = new AnswerUploadFile();
        $auf->id = $questionId;
        $aufId = $auf->id;
        $auf->file_name = $fileName;
        $auf->upload_folder_name_id = $uploadFolderNameId;
        $auf->save();
        return $aufId;
    }
}
