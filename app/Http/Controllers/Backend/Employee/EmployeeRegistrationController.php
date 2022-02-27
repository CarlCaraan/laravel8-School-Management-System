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

class EmployeeRegistrationController extends Controller
{
    public function ViewEmployeeRegister()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.employee_registration.employee_view', $data);
    }

    public function EmployeeRegisterAdd()
    {
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_add', $data);
    }

    public function EmployeeRegisterStore(Request $request)
    {
        $validatedData = $request->validate([
            // ========= USER TABLE =========
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'designation_id' => 'required',
            'salary' => 'required',
            'join_date' => 'required',
        ]);
        DB::transaction(function () use ($request) {

            // ========= USER TABLE =========
            // Generate Unique ID
            $check_year =  date('Ym', strtotime($request->join_date));
            // dd($check_year);
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();
            if ($employee == NULL) {
                $first_register = 0;
                $employee_id = $first_register + 1;
                if ($employee_id < 10) {
                    $id_no = '000' . $employee_id;
                } elseif ($employee_id < 100) {
                    $id_no = '00' . $employee_id;
                } elseif ($employee_id < 1000) {
                    $id_no = '0' . $employee_id;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employee_id = $employee + 1;
                if ($employee_id < 10) {
                    $id_no = '000' . $employee_id;
                } elseif ($employee_id < 100) {
                    $id_no = '00' . $employee_id;
                } elseif ($employee_id < 1000) {
                    $id_no = '0' . $employee_id;
                }
            } // End Else

            $final_id_no = $check_year . $id_no;
            $user = new User();
            $code = rand(0000, 9999);

            // Storing Data
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));

            // Storing Image
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            // ========= Employee Salary Logs Table =========
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = "0";
            $employee_salary->save();
        });
        $notification = array(
            'message' => 'Employee Registration Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.registration.view')->with($notification);
    } // End Method

    public function EmployeeRegisterEdit($id)
    {
        $data['editData'] = User::find($id);
        $data['designations'] = Designation::all();

        return view('backend.employee.employee_registration.employee_edit', $data);
    }

    public function EmployeeRegisterUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            // ========= USER TABLE =========
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'designation_id' => 'required',
        ]);
        $user = User::find($id);

        // Storing Data
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d', strtotime($request->dob));

        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' . $user->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $filename);
            $user['image'] = $filename;
        }
        $user->save();

        $notification = array(
            'message' => 'Employee Registration Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeRegisterDetails($id)
    {
        $data['details'] = User::find($id);

        // ========= Start Niklas Laravel PDF =========
        $pdf = PDF::loadView('backend.employee.employee_registration.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
        // ========= End Niklas Laravel PDF =========
    }

    public function EmployeeRegisterDelete($id)
    {
        $user = User::where('id', $id)->first();
        @unlink(public_path('upload/employee_images/' . $user->image));

        User::where('id', $id)->delete();
        EmployeeSalaryLog::where('employee_id', $id)->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }
}
