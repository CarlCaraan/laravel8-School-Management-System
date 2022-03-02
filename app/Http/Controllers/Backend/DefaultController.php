<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;
use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\AssignSubject;

class DefaultController extends Controller
{
    public function GetSubject(Request $request)
    {
        $class_id = $request->class_id;
        $allData = AssignSubject::with(['school_subject'])->where('class_id', $class_id)->get();

        return response()->json($allData);
    }

    public function GetStudent(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudent::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->get();

        return response()->json($allData);
    }
}
