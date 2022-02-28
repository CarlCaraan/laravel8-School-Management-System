@extends('admin.admin_master')

@section('title') View Attendance | ASMS @endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Attendance List</h3>
                            <a href="{{ route('employee.attendance.add') }}" class="btn btn-rounded btn-success mb-5 float-right">Add Attendance</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Date</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                {!! htmlspecialchars_decode(date('F j, Y', strtotime($value->date))) !!}
                                                <!-- {!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($value->date))) !!} -->
                                                <!-- {{ date('d-m-Y', strtotime($value->date)) }} -->
                                            </td>
                                            <td>
                                                <a href="{{ route('employee.attendance.edit',$value->date) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('employee.attendance.details',$value->date) }}" class="btn btn-primary">Details</a>
                                                <a href="" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
@endsection