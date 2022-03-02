<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Marks\GradeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {

    // ========= User Management All Route =========
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
        Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    });

    // ========= User Profile and Change Password =========
    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });

    // ========= Setup Management =========
    Route::prefix('setups')->group(function () {
        // Student Class
        Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
        Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
        Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

        // Student Year
        Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
        Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
        Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
        Route::post('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

        // Student Group
        Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
        Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

        // Student Shift
        Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
        Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

        // Fee Category
        Route::get('/fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
        Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee.category.add');
        Route::post('/fee/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee.category.store');
        Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
        Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');
        Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

        // Fee Category Amount
        Route::get('/fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
        Route::get('/fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');
        Route::post('/fee/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('fee.amount.store');
        Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
        Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee.amount.update');
        Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');
        Route::get('/fee/amount/delete/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDelete'])->name('fee.amount.delete');

        // Exam Type
        Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
        Route::post('/exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
        Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
        Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

        // School Subject
        Route::get('/school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
        Route::get('/school/subject/add', [SchoolSubjectController::class, 'SchoolSubjectAdd'])->name('school.subject.add');
        Route::post('/school/subject/store', [SchoolSubjectController::class, 'SchoolSubjectStore'])->name('school.subject.store');
        Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'SchoolSubjectEdit'])->name('school.subject.edit');
        Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'SchoolSubjectUpdate'])->name('school.subject.update');
        Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'SchoolSubjectDelete'])->name('school.subject.delete');

        // Assign Subject
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');
        Route::post('/assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
        Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
        Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
        Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');
        Route::get('/assign/subject/delete/{class_id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');

        // Designation
        Route::get('/designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
        Route::post('/designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
        Route::post('/designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
    });

    // ========= Student Management =========
    Route::prefix('students')->group(function () {
        // Student Registration
        Route::get('/register/view', [StudentRegistrationController::class, 'ViewStudentRegister'])->name('student.registration.view');
        Route::get('/register/add', [StudentRegistrationController::class, 'StudentRegisterAdd'])->name('student.registration.add');
        Route::post('/register/store', [StudentRegistrationController::class, 'StudentRegisterStore'])->name('student.registration.store');
        Route::get('/year/class/wise', [StudentRegistrationController::class, 'StudentYearClassWise'])->name('student.year.class.wise'); // Search Function
        Route::get('/register/edit/{student_id}', [StudentRegistrationController::class, 'StudentRegisterEdit'])->name('student.registration.edit');
        Route::post('/register/update/{student_id}', [StudentRegistrationController::class, 'StudentRegisterUpdate'])->name('student.registration.update');
        Route::get('/register/promotion/{student_id}', [StudentRegistrationController::class, 'StudentRegisterPromotion'])->name('student.registration.promotion'); // Promotion Edit View
        Route::post('/register/promote/{student_id}', [StudentRegistrationController::class, 'StudentRegisterPromote'])->name('student.registration.promote'); // Promotion Function
        Route::get('/register/delete/{student_id}', [StudentRegistrationController::class, 'StudentRegisterDelete'])->name('student.registration.delete');
        Route::get('/register/details/{student_id}', [StudentRegistrationController::class, 'StudentRegisterDetails'])->name('student.registration.details'); 

        // Student Roll Generate
        Route::get('/roll/generate/view', [StudentRollController::class, 'ViewStudentRoll'])->name('roll.generate.view');
        Route::get('/register/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents'); // Json Get All Data using Search Filter 
        Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

        // Student Registration Fee
        Route::get('/registration/fee/view', [RegistrationFeeController::class, 'ViewRegistrationFee'])->name('registration.fee.view');
        Route::get('/registration/fee/classwise', [RegistrationFeeController::class, 'ViewRegistrationFeeClasswise'])->name('student.registration.fee.classwise.get'); // Handbars Get All Data
        Route::get('/registration/fee/payslip', [RegistrationFeeController::class, 'ViewRegistrationFeePayslip'])->name('student.registration.fee.payslip');

        // Student Monthly Fee
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'ViewMonthlyFee'])->name('monthly.fee.view');
        Route::get('/monthly/fee/classwise', [MonthlyFeeController::class, 'ViewMonthlyFeeClasswise'])->name('student.monthly.fee.classwise.get'); // Handbars Get All Data
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'ViewMonthlyFeePayslip'])->name('student.monthly.fee.payslip');

        // Student Exam Fee
        Route::get('/exam/fee/view', [ExamFeeController::class, 'ViewExamFee'])->name('exam.fee.view');
        Route::get('/exam/fee/classwise', [ExamFeeController::class, 'ViewExamFeeClasswise'])->name('student.exam.fee.classwise.get'); // Handbars Get All Data
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ViewExamFeePayslip'])->name('student.exam.fee.payslip');
    });

    // ========= Employee Management =========
    Route::prefix('employees')->group(function () {
        // Employee Registration
        Route::get('/register/view', [EmployeeRegistrationController::class, 'ViewEmployeeRegister'])->name('employee.registration.view');
        Route::get('/register/add', [EmployeeRegistrationController::class, 'EmployeeRegisterAdd'])->name('employee.registration.add');
        Route::post('/register/store', [EmployeeRegistrationController::class, 'EmployeeRegisterStore'])->name('employee.registration.store');
        Route::get('/register/edit/{id}', [EmployeeRegistrationController::class, 'EmployeeRegisterEdit'])->name('employee.registration.edit');
        Route::post('/register/update/{id}', [EmployeeRegistrationController::class, 'EmployeeRegisterUpdate'])->name('employee.registration.update');
        Route::get('/register/details/{id}', [EmployeeRegistrationController::class, 'EmployeeRegisterDetails'])->name('employee.registration.details');
        Route::get('/register/delete/{id}', [EmployeeRegistrationController::class, 'EmployeeRegisterDelete'])->name('employee.registration.delete');

        // Employee Salary
        Route::get('/salary/view', [EmployeeSalaryController::class, 'ViewEmployeeSalary'])->name('employee.salary.view');
        Route::get('/salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('employee.salary.increment');
        Route::post('/salary/increment/store/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrementStore'])->name('employee.salary.increment.store');
        Route::get('/salary/increment/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('employee.salary.details');

        // Employee Leave
        Route::get('/leave/view', [EmployeeLeaveController::class, 'ViewEmployeeLeave'])->name('employee.leave.view');
        Route::get('/leave/add', [EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('employee.leave.add');
        Route::post('/leave/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('employee.leave.store');
        Route::get('/leave/edit/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveEdit'])->name('employee.leave.edit');
        Route::post('/leave/update/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveUpdate'])->name('employee.leave.update');
        Route::get('/leave/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('employee.leave.delete');
        
        // Employee Attendance
        Route::get('/attendance/view', [EmployeeAttendanceController::class, 'ViewEmployeeAttendance'])->name('employee.attendance.view');
        Route::get('/attendance/add', [EmployeeAttendanceController::class, 'EmployeeAttendanceAdd'])->name('employee.attendance.add');
        Route::post('/attendance/store', [EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('employee.attendance.store');
        Route::get('/attendance/edit/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('employee.attendance.edit');
        Route::post('/attendance/update', [EmployeeAttendanceController::class, 'EmployeeAttendanceUpdate'])->name('employee.attendance.update');
        Route::get('/attendance/details/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceDetails'])->name('employee.attendance.details');

        // Employee Monthly Salary
        Route::get('/monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryDetails'])->name('employee.monthly_salary.view');
        Route::get('/monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly_salary.get'); // Handlebars Get All Data
        Route::get('/monthly/salary/payslip{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly_salary.payslip'); 
    });

    // ========= Marks Management =========
    Route::prefix('marks')->group(function () {
        // Marks Entry
        Route::get('/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
        Route::post('/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');

        // Marks Edit
        Route::get('/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
        Route::get('/entry/edit/getstudent', [MarksController::class, 'MarksEditGetStudent'])->name('student.marks.edit.getstudents');
        Route::post('/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');

        //Marks Grade
        Route::get('/grade/view', [GradeController::class, 'ViewMarksGrade'])->name('marks.entry.grade');
        
    });
    Route::get('/marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
    Route::get('/marks/getstudent', [DefaultController::class, 'GetStudent'])->name('student.marks.getstudents');

}); // End Middleware Auth
