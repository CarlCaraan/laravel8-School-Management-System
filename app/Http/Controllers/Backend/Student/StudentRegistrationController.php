<?php

namespace App\Http\Controllers\Backend\Student;

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

class StudentRegistrationController extends Controller
{
    public function ViewStudentRegister()
    {
        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_registration.student_view', $data);
    }

    public function StudentRegisterAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_registration.student_add', $data);
    }

    public function StudentRegisterStore(Request $request)
    {
        DB::transaction(function() use($request){

            // ========= USER TABLE =========
            // Generate Unique ID
            $check_year =  StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id','DESC')->first();
            if ($student == NULL) {
                $first_register = 0;
                $student_id = $first_register+1;
                if ($student_id < 10) {
                    $id_no = '000' . $student_id;
                }elseif ($student_id < 100) {
                    $id_no = '00' . $student_id;
                }elseif ($student_id < 1000) {
                    $id_no = '0' . $student_id;
                }
            }else{
                $student = User::where('usertype', 'Student')->orderBy('id','DESC')->first()->id;
                $student_id = $student+1;
                if ($student_id < 10) {
                    $id_no = '000' . $student_id;
                }elseif ($student_id < 100) {
                    $id_no = '00' . $student_id;
                }elseif ($student_id < 1000) {
                    $id_no = '0' . $student_id;
                }
            }// End Else
            
            $final_id_no = $check_year.$id_no;
            $user = new User();
            $code = rand(0000,9999);

            // Storing Data
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            // Storing Image
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            // ========= ASSIGN STUDENT TABLE =========
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            // ========= DISCOUNT STUDENT TABLE =========
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
            $notification = array(
                'message' => 'Student Registration Inserted Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('student.registration.view')->with($notification);
    } // End Method
}
