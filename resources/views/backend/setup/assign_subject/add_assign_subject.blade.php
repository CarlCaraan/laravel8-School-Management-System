@extends('admin.admin_master')

@section('title') Add Assign Subject | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Assign Subject</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('assign.subject.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5>Class Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Class Name</option>
                                                        @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('class_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Form Group -->
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Student Subject<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id[]" class="form-control">
                                                                <option value="" selected="" disabled="">Select Subject</option>
                                                                @foreach ($subjects as $subject)
                                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('subject_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- End Form Group -->
                                                </div> <!-- End Col -->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Full Mark<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="full_mark[]" class="form-control" required>
                                                        </div>
                                                        @error('full_mark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- End Form Group -->
                                                </div> <!-- End Col -->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Pass Mark<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="pass_mark[]" class="form-control" required>
                                                        </div>
                                                        @error('pass_mark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- End Form Group -->
                                                </div> <!-- End Col -->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Subjective Mark<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjective_mark[]" class="form-control" required>
                                                        </div>
                                                        @error('subjective_mark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- End Form Group -->
                                                </div> <!-- End Col -->

                                                <div class="col-md-2" style="padding-top: 25px;">
                                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                </div>
                                            </div>
                                        </div> <!-- End add_item -->
                                    </div> <!-- End Col -->
                                </div> <!-- End Row -->
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info btn-rounded mb-5" value="Submit">
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

<!-- Start Hidden Row Javascript -->
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Subject<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" class="form-control">
                                <option value="" selected="" disabled="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> <!-- End Form Group -->
                </div> <!-- End Col -->

                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Full Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control" required>
                        </div>
                        @error('full_mark')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> <!-- End Form Group -->
                </div> <!-- End Col -->

                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Pass Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="pass_mark[]" class="form-control" required>
                        </div>
                        @error('pass_mark')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> <!-- End Form Group -->
                </div> <!-- End Col -->

                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Subjective Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subjective_mark[]" class="form-control" required>
                        </div>
                        @error('subjective_mark')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> <!-- End Form Group -->
                </div> <!-- End Col -->

                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
<!-- End Hidden Row Javascript -->
@endsection