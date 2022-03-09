@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Easy</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role == 'Admin')
            <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'user.view') || ($route == 'user.edit') ? 'active' : '' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
                    <li class="{{ ($route == 'user.add') ? 'active' : '' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>
            @endif

            <li class="treeview {{ ($prefix == '/profile') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="grid"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'profile.view') || ($route == 'profile.edit') ? 'active' : '' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
                    <li class="{{ ($route == 'password.view') ? 'active' : '' }}"><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/setups') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'student.class.view') ||
                        ($route == 'student.class.edit') ||
                        ($route == 'student.class.add') ? 'active' : '' }}">
                        <a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a>
                    </li>
                    <li class="{{ ($route == 'student.year.view') ||
                        ($route == 'student.year.edit') ||
                        ($route == 'student.year.add') ? 'active' : '' }}">
                        <a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a>
                    </li>
                    <li class="{{ ($route == 'student.group.view') ||
                        ($route == 'student.group.edit') ||
                        ($route == 'student.group.add') ? 'active' : '' }}">
                        <a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a>
                    </li>
                    <li class="{{ ($route == 'student.shift.view') ||
                        ($route == 'student.shift.edit') ||
                        ($route == 'student.shift.add') ? 'active' : '' }}">
                        <a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a>
                    </li>
                    <li class="{{ ($route == 'fee.category.view') ||
                        ($route == 'fee.category.edit') ||
                        ($route == 'fee.category.add') ? 'active' : '' }}">
                        <a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a>
                    </li>
                    <li class="{{ ($route == 'fee.amount.view') ||
                        ($route == 'fee.amount.edit') ||
                        ($route == 'fee.amount.add') ||
                        ($route == 'fee.amount.details') ? 'active' : '' }}">
                        <a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a>
                    </li>
                    <li class="{{ ($route == 'exam.type.view') ||
                        ($route == 'exam.type.edit') ||
                        ($route == 'exam.type.add') ? 'active' : '' }}">
                        <a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a>
                    </li>
                    <li class="{{ ($route == 'school.subject.view') ||
                        ($route == 'school.subject.edit') ||
                        ($route == 'school.subject.add') ? 'active' : '' }}">
                        <a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a>
                    </li>
                    <li class="{{ ($route == 'assign.subject.view') ||
                        ($route == 'assign.subject.edit') ||
                        ($route == 'assign.subject.add') ? 'active' : '' ||
                        ($route == 'assign.subject.details') ? 'active' : '' }}">
                        <a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a>
                    </li>
                    <li class="{{ ($route == 'designation.view') ||
                        ($route == 'designation.edit') ||
                        ($route == 'designation.add') ? 'active' : '' }}">
                        <a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/students') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'student.registration.view') ||
                        ($route == 'student.registration.edit') ||
                        ($route == 'student.registration.add') ||
                        ($route == 'student.year.class.wise') ||
                        ($route == 'student.registration.promotion') ? 'active' : '' }}">
                        <a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a>
                    </li>
                    <li class="{{ ($route == 'roll.generate.view') ? 'active' : '' }}">
                        <a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a>
                    </li>
                    <li class="{{ ($route == 'registration.fee.view') ? 'active' : '' }}">
                        <a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a>
                    </li>
                    <li class="{{ ($route == 'monthly.fee.view') ? 'active' : '' }}">
                        <a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee</a>
                    </li>
                    <li class="{{ ($route == 'exam.fee.view') ? 'active' : '' }}">
                        <a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/employees') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="package"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'employee.registration.view') ||
                        ($route == 'employee.registration.edit') ||
                        ($route == 'employee.registration.add') ? 'active' : '' }}">
                        <a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a>
                    </li>
                    <li class="{{ ($route == 'employee.salary.view') ||
                        ($route == 'employee.salary.edit') ||
                        ($route == 'employee.salary.add')||
                        ($route == 'employee.salary.details') ? 'active' : '' }}">
                        <a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a>
                    </li>
                    <li class="{{ ($route == 'employee.leave.view') ||
                        ($route == 'employee.leave.edit') ||
                        ($route == 'employee.leave.add') ? 'active' : '' }}">
                        <a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a>
                    </li>
                    <li class="{{ ($route == 'employee.attendance.view') ||
                        ($route == 'employee.attendance.edit') ||
                        ($route == 'employee.attendance.add') ||
                        ($route == 'employee.attendance.details') ? 'active' : '' }}">
                        <a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a>
                    </li>
                    <li class="{{ ($route == 'employee.monthly_salary.view') ||
                        ($route == 'employee.monthly_salary.edit') ||
                        ($route == 'employee.monthly_salary.add') ? 'active' : '' }}">
                        <a href="{{ route('employee.monthly_salary.view') }}"><i class="ti-more"></i>Employee Monthly Salary</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/marks') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="edit-2"></i> <span>Marks Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'marks.entry.add') ? 'active' : '' }}">
                        <a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a>
                    </li>
                    <li class="{{ ($route == 'marks.entry.edit') ? 'active' : '' }}">
                        <a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a>
                    </li>
                    <li class="{{ ($route == 'marks.grade.view') ||
                        ($route == 'marks.grade.add') ||
                        ($route == 'marks.grade.edit') ? 'active' : '' }}">
                        <a href="{{ route('marks.grade.view') }}"><i class="ti-more"></i>Marks Grade</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/accounts') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="inbox"></i> <span>Accounts Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'student.fee.view') ||
                        ($route == 'student.fee.add') ? 'active' : '' }}">
                        <a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Student Fee</a>
                    </li>
                    <li class="{{ ($route == 'account.salary.view') ||
                        ($route == 'account.salary.add') ? 'active' : '' }}">
                        <a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a>
                    </li>
                    <li class="{{ ($route == 'other.cost.view') ||
                        ($route == 'other.cost.add') ? 'active' : '' }}">
                        <a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a>
                    </li>
                </ul>
            </li>

            <li class="header nav-small-cap">Report Interface</li>

            <li class="treeview {{ ($prefix == '/reports') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="server"></i> <span>Reports Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'monthly.profit.view') ? 'active' : '' }}">
                        <a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profit</a>
                    </li>
                    <li class="{{ ($route == 'marksheet.generate.view') ||
                        ($route == 'marksheet.generate.get')? 'active' : '' }}">
                        <a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>MarkSheet Generate</a>
                    </li>
                    <li class="{{ ($route == 'attendance.report.view') ||
                        ($route == 'attendance.report.get') ? 'active' : '' }}">
                        <a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a>
                    </li>
                    <li class="{{ ($route == 'student.result.view') ||
                        ($route == 'student.result.get') ? 'active' : '' }}">
                        <a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result</a>
                    </li>
                    <li class="{{ ($route == 'student.idcard.view') ||
                        ($route == 'student.idcard.get') ? 'active' : '' }}">
                        <a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student Id Card</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>