@extends('admin.admin_master')

@section('title') Marksheet Generate | ASMS @endsection

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
                            <h4 class="box-title">Manage <strong>MarkSheet Generate</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="GET" action="{{ route('marksheet.generate.get') }}" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Exam Type</h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Exam Type</option>
                                                    @foreach ($exam_types as $exam_type)
                                                    <option value="{{ $exam_type->id }}">{{ $exam_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('exam_type_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>ID No<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="id_no" class="form-control">
                                            </div>
                                            @error('id_no')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- End Col -->

                                    <div class="col-md-3">
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