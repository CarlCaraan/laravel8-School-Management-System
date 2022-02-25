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

    }
}
