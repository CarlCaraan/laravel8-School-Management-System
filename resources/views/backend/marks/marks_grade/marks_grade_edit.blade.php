@extends('admin.admin_master')

@section('title') Edit Grade Marks | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Grade Marks</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('marks.grade.update', $editData->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Grade Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" class="form-control" value="{{ $editData->grade_name }}">
                                                    </div>
                                                    @error('grade_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Grade Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point" class="form-control" value="{{ $editData->grade_point }}">
                                                    </div>
                                                    @error('grade_point')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Start Marks<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_marks" class="form-control" value="{{ $editData->start_marks }}">
                                                    </div>
                                                    @error('start_marks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>End Marks<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_marks" class="form-control" value="{{ $editData->end_marks }}">
                                                    </div>
                                                    @error('end_marks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Start Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" class="form-control" value="{{ $editData->start_point }}">
                                                    </div>
                                                    @error('start_point')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>End Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" class="form-control" value="{{ $editData->end_point }}">
                                                    </div>
                                                    @error('end_point')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Remarks<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remarks" class="form-control" value="{{ $editData->remarks }}">
                                                    </div>
                                                    @error('remarks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div><!-- End Row -->

                                    </div> <!-- End Col-12 -->
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