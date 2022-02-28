<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;

use App\Models\EmployeeSalaryLog;
use App\Models\Designation;

use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\EmployeeAttendance;

class EmployeeAttendanceController extends Controller
{
    public function ViewEmployeeAttendance()
    {
        // $data['allData'] = EmployeeAttendance::orderBy('id','desc')->get();
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('date', 'DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    public function EmployeeAttendanceAdd()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_add', $data);
    }

    public function EmployeeAttendanceStore(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required'
        ]);

        $count_employee = count($request->employee_id);
        for ($i = 0; $i < $count_employee; $i++) {
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attendance_status = 'attend_status' . $i;
            $attend->attend_status = $request->$attendance_status;
            $attend->save();
        } // End For Loop

        $notification = array(
            'message' => 'Employee Attendance Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.attendance.view')->with($notification);
    } // End Method

    public function EmployeeAttendanceEdit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_edit', $data);
    }

    public function EmployeeAttendanceUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required'
        ]);

        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $count_employee = count($request->employee_id);
        for ($i = 0; $i < $count_employee; $i++) {
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attendance_status = 'attend_status' . $i;
            $attend->attend_status = $request->$attendance_status;
            $attend->save();
        } // End For Loop

        $notification = array(
            'message' => 'Employee Attendance Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.attendance.view')->with($notification);
    }

    public function EmployeeAttendanceDetails($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details', $data);
    }
}
