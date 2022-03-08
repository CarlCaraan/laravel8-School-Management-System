@extends('admin.admin_master')

@section('title') Attendance Report | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <!-- Start Student Search  -->
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Manage <strong>Employe Attendance Report</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="GET" action="{{ route('attendance.report.get') }}" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Name</h5>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-4" style="padding-top: 25px;">
                                        <input type="submit" class="btn btn-primary" value="Search">
                                    </div> <!-- End Col -->

                                </div> <!-- End Row -->

                            </form>
                        </div>
                    </div>
                    <!-- End Student Search  -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
@endsection