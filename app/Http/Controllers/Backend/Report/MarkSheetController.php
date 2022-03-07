<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;

class MarkSheetController extends Controller
{
    public function ViewMarkSheetGenerate()
    {
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marksheet.marksheet_generate_view', $data);
    }

    public function MarkSheetGenerateGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks','<', '33')->get()->count();
        // dd($count_fail);
        $single_student = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();

        if($single_student == true) {
            $allMarks = StudentMarks::with(['assign_subject', 'student_year'])->where('year_id', $year_id)->where('class_id', $class_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();
            // dd($allMarks->toArray());
            $allGrades = MarksGrade::all();
            return view('backend.marksheet.marksheet_pdf', compact('allMarks', 'allGrades','count_fail'));
        }else{
            $notification = array(
                'message' => 'Sorry this credentials does not match',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

    } // End Method
}
