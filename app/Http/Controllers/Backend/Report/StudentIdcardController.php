<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;
use App\Models\AssignStudent;
use PDF;

class StudentIdcardController extends Controller
{
    public function ViewStudentIdcard()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.report.idcard.idcard_view', $data);
    }

    public function StudentIdcardGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $check_data = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->first();
        if($check_data == true) {
            $data['allData'] = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->get();
            // dd($data['allData']->toArray());

            // ========= Start Niklas Laravel PDF =========
            $pdf = PDF::loadView('backend.report.idcard.idcard_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
            // ========= End Niklas Laravel PDF =========
        }else{
            $notification = array(
                'message' => 'Sorry this credentials does not match',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    } // End Method
}
