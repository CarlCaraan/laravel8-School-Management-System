@extends('admin.admin_master')

@section('title') Student Marks Entry | ASMS @endsection

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
                            <h4 class="box-title">Student <strong>Marks Entry</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="POST" action="{{ route('marks.entry.store') }}">
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
                                            <h5>Subject</h5>
                                            <div class="controls">
                                                <select name="assign_subject_id" id="assign_subject_id" class="form-control">
                                                    <option selected="">Select Subject</option>

                                                </select>
                                            </div>
                                            @error('assign_subject_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                        <a id="search" class="btn btn-primary" name="search">Search</a>
                                    </div> <!-- End Col -->

                                </div> <!-- End Row -->

                                <!-- Start Table -->
                                <div class="row d-none" id="marks-generate">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-stripped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID No</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Mother Name</th>
                                                    <th>Gender</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody id="marks-generate-tr">

                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn btn-rounded btn-success" value="Submit">
                                    </div>
                                </div>
                                <!-- End Table -->

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

<!-- Start Json Show Data Table -->
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $.ajax({
            url: "{{ route('student.marks.getstudents')}}",
            type: "GET",
            data: {
                'year_id': year_id,
                'class_id': class_id
            },
            success: function(data) {
                $('#marks-generate').removeClass('d-none');
                var html = '';
                $.each(data, function(key, v) {
                    html +=
                        '<tr>' +
                        '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"> <input type="hidden" name="id_no[]" value="' + v.student.id_no + '"></td>' +
                        '<td>' + v.student.name + '</td>' +
                        '<td>' + v.student.father_name + '</td>' +
                        '<td>' + v.student.mother_name + '</td>' +
                        '<td>' + v.student.gender + '</td>' +
                        '<td><input type="text" class="form-control form-control-sm" name="marks[]"></td>' +
                        '</tr>';
                });
                html = $('#marks-generate-tr').html(html);
            }
        });
    });
</script>
<!-- End Json Show Data Table -->

<!-- Start Json Get Subject Select Options -->
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#class_id', function() {
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{ route('marks.getsubject') }}",
                type: "GET",
                data: {
                    class_id: class_id
                },
                success: function(data) {
                    var html = '<option value="">Select Subject</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.school_subject.name + '</option>';
                    });
                    $('#assign_subject_id').html(html);
                }
            });
        });
    });
</script>
<!-- End Json Get Subject Select Options -->
@endsection