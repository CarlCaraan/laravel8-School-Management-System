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

class EmployeeSalaryController extends Controller
{
    public function ViewEmployeeSalary()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function EmployeeSalaryIncrement($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment', $data);
    }

    public function EmployeeSalaryIncrementStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'increment_salary' => 'required',
            'effected_salary' => 'required',
        ]);
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salary_logs_data = new EmployeeSalaryLog();
        $salary_logs_data->employee_id = $id;
        $salary_logs_data->previous_salary = $previous_salary;
        $salary_logs_data->present_salary = $present_salary;
        $salary_logs_data->increment_salary = $request->increment_salary;
        $salary_logs_data->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salary_logs_data->save();

        $notification = array(
            'message' => 'Employee Salary Incremented Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function EmployeeSalaryDetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_logs'] = EmployeeSalaryLog::where('employee_id', $id)->get();
        // $data['salary_logs'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();
        // dd($data['salary_logs']->toArray());

        return view('backend.employee.employee_salary.employee_salary_details', $data);
    }
}
