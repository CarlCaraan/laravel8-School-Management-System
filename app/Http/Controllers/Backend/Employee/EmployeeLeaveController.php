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

class EmployeeLeaveController extends Controller
{
    public function ViewEmployeeLeave()
    {
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee_leave.employee_leave_view', $data);
    }

    public function EmployeeLeaveAdd()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add', $data);
    }

    public function EmployeeLeaveStore(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'leave_purpose_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($request->leave_purpose_id == "0") {
            $leave_purpose = new LeavePurpose();
            $leave_purpose->name = $request->name;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Employee Leave Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.leave.view')->with($notification);
    } // End Method

    public function EmployeeLeaveEdit($id)
    {
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','Employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.employee_leave_edit', $data);
    }

    public function EmployeeLeaveUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'leave_purpose_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($request->leave_purpose_id == "0") {
            $leave_purpose = new LeavePurpose();
            $leave_purpose->name = $request->name;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Employee Leave Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.leave.view')->with($notification);

    } // End Method
    
    public function EmployeeLeaveDelete($id)
    {
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        $notification = array(
            'message' => 'Employee Leave Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }
}
