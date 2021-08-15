<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnswerQuestion;
use App\Models\AnswerText;
use App\Models\AnswerUploadFile;
use App\Models\Attedance;
use App\Models\Fill;
use App\Models\FormAnswer;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class FillController extends Controller
{
    public function fill(Request $request)
    {
        $formAnswerId = FormAnswer::storeNew(); // Membuat data form_answer
        $classId = $request->class_id;

        // Membuat data fill
        $fillData = [
            "lecturer_id" => $request->lecturer_id,
            "form_id" => $request->form_id,
            "form_answer_id" => $formAnswerId,
            "class_id" => $classId,
            "school_year_id" => $request->school_year_id,
            "semester" => $request->semester
        ];
        Fill::store($fillData); // menyimpan fill

        // Menyimpan presensi
        $students = Mahasiswa::getByClassId($classId);
        foreach($students as $student) {
            if (isset($request['presence'.$student->nim])) {
                $studentId = Mahasiswa::getIdByNIM($student->nim);
                $presence = $request['presence'.$student->nim];
                $note = $request['keterangan'.$student->nim];
                $note = $note == null ? "" : $note;
                Attedance::store($studentId, $formAnswerId, $presence, $note);
            }
        }

        // Menyimpan jawaban
        $questionIndex = 0;
        while (isset($request["question".$questionIndex])) {
            $qt = $request["question".$questionIndex."_type_id"];
            $aqId = AnswerQuestion::store($formAnswerId, $qt, $questionIndex + 1); // id dari answer_question yg telah disimpan
            if ($qt == 3) { // upload file
                $folderName = "bukti_perwalian"; // Nama folder (perlu diubah)
                $uploadFolderNameId = 1; // id upload_folder_name (perlu diubah)
                $berkas = $request->file("question".$questionIndex); // mengambil data berkas
                $nama_berkas = $berkas->getClientOriginalName(); // menyimpan nama berkas

                $fileId = AnswerUploadFile::store($aqId, $nama_berkas, $uploadFolderNameId); // menyimpan data answer_upload_file dan menyimpan id-nya
                // echo $fileId;
                $tujuan_upload = 'upload/'.$folderName.'/'.$fileId; // folder tujuan upload berkas
                $berkas->move($tujuan_upload,$nama_berkas); // upload berkas
            }
            else if ($qt == 5 || $qt == 6) { // text
                AnswerText::store($aqId, $request["question".$questionIndex]);
            }
            $questionIndex++;
        }

        return redirect()->route('beranda-dosen');
    }
}
