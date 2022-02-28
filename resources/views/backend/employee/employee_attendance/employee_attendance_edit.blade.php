@extends('admin.admin_master')

@section('title') Edit Attendance | ASMS @endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Attendance</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.attendance.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Attendance Date<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control" value="{{ $editData['0']['date'] }}">
                                                    </div>
                                                    @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%;">Attendance Status</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center btn present_all" style="display: table-cell; background-color: #000;">Present</th>
                                                            <th class="text-center btn leave_all" style="display: table-cell; background-color: #000;">Leave</th>
                                                            <th class="text-center btn absent_all" style="display: table-cell; background-color: #000;">Absent</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($editData as $key => $data)
                                                        <tr id="div{{ $data->id }}" class="text-center">
                                                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $data['user']['name'] }}</td>
                                                            <td style="border:none;">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input name="attend_status{{ $key }}" type="radio" id="present{{ $key }}" value="Present" {{ ($data->attend_status == 'Present' ? 'Checked' : '') }}>
                                                                    <label for="present{{ $key }}">Present</label>
                                                                </div>
                                                            </td>
                                                            <td style="border:none;">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input name="attend_status{{ $key }}" type="radio" id="leave{{ $key }}" value="Leave" {{ ($data->attend_status == 'Leave' ? 'Checked' : '') }}>
                                                                    <label for="leave{{ $key }}">Leave</label>
                                                                </div>
                                                            </td>
                                                            <td style="border:none;">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input name="attend_status{{ $key }}" type="radio" id="absent{{ $key }}" value="Absent" {{ ($data->attend_status == 'Absent' ? 'Checked' : '') }}>
                                                                    <label for="absent{{ $key }}">Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->
                                    </div>
                                </div> <!-- End Row -->
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info btn-rounded mb-5" value="Update">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

    </div>
</div>
@endsection