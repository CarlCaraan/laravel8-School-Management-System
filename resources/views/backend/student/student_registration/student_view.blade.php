@extends('admin.admin_master')

@section('title') View Student List | ASMS @endsection

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <!-- Start Student Search  -->
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('student.year.class.wise') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach ($years as $year)
                                                    <option value="{{ $year->id }}" {{ ($year->id == @$year_id ? "selected" : "") }}>{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('year_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" {{ ($class->id == @$class_id ? "selected" : "") }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('class_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- End Col -->
                                    <div class="col-md-4" style="padding-top: 25px">
                                        <input type="submit" name="search" value="Search" class="btn btn-rounded btn-dark">
                                    </div> <!-- End Col -->
                                </div> <!-- End Row -->
                            </form>
                        </div>
                    </div>
                    <!-- End Student Search  -->

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student List</h3>
                            <a href="{{ route('student.registration.add') }}" class="btn btn-rounded btn-success mb-5 float-right">Add Student</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                @if(!@search)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Student Name</th>
                                            <th>ID No</th>
                                            <th>Roll</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value['student']['name'] }}</td>
                                            <td>{{ $value['student']['id_no'] }}</td>
                                            <td>{{ $value->roll }}</td>
                                            <td>{{ $value['student_year']['name'] }}</td>
                                            <td>{{ $value['student_class']['name'] }}</td>
                                            <td>
                                                <img style="width: 60px; height: 60px;" src="
                                                {{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}
                                                " alt="">
                                            </td>
                                            <td>{{ $value['student']['code'] }}</td>
                                            <td>
                                                <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-primary">Promotion</a>
                                                <a href="" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                                @else
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Student Name</th>
                                            <th>ID No</th>
                                            <th>Roll</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "Admin")
                                            <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value['student']['name'] }}</td>
                                            <td>{{ $value['student']['id_no'] }}</td>
                                            <td>{{ $value->roll }}</td>
                                            <td>{{ $value['student_year']['name'] }}</td>
                                            <td>{{ $value['student_class']['name'] }}</td>
                                            <td>
                                                <img style="width: 60px; height: 60px;" src="
                                                {{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}
                                                " alt="">
                                            </td>
                                            <td>{{ $value['student']['code'] }}</td>
                                            <td>
                                                <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-primary">Promotion</a>
                                                <a href="" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                                @endif
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