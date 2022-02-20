@extends('admin.admin_master')

@section('title') Edit Student | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Student</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('student.registration.update',$editData->student_id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editData->id }}"> 
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $editData['student']['name'] }}">
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Father's Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="father_name" class="form-control" value="{{ $editData['student']['father_name'] }}">
                                                    </div>
                                                    @error('father_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mother_name" class="form-control" value="{{ $editData['student']['mother_name'] }}">
                                                    </div>
                                                    @error('mother_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mobile Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" value="{{ $editData['student']['mobile'] }}">
                                                    </div>
                                                    @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control" value="{{ $editData['student']['address'] }}">
                                                    </div>
                                                    @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Gender<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" class="form-control">
                                                            <option value="" selected="" disabled="">Select Gender</option>
                                                            <option value="Male" {{ ($editData['student']['gender'] == 'Male') ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{ ($editData['student']['gender'] == 'Female') ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" class="form-control">
                                                            <option value="" selected="" disabled="">Select Religion</option>
                                                            <option value="Catholic" {{ ($editData['student']['religion'] == 'Catholic') ? 'selected' : ''}}>Catholic</option>
                                                            <option value="Islam" {{ ($editData['student']['religion'] == 'Islam') ? 'selected' : ''}}>Islam</option>
                                                            <option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                                                        </select>
                                                    </div>
                                                    @error('religion')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date of Birth<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control" value="{{ $editData['student']['dob'] }}">
                                                    </div>
                                                    @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" class="form-control" value="{{ $editData['discount']['discount'] }}">
                                                    </div>
                                                    @error('discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Year<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year</option>
                                                            @foreach ($years as $year)
                                                            <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? 'selected' : ''}}>{{ $year->name }}</option>
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
                                                    <h5>Class<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Class</option>
                                                            @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? 'selected' : ''}}>{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('class_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Group<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Group</option>
                                                            @foreach ($groups as $group)
                                                            <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id) ? 'selected' : ''}}>{{ $group->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('group_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Shift<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Shift</option>
                                                            @foreach ($shifts as $shift)
                                                            <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id) ? 'selected' : ''}}>{{ $shift->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('shift_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Profile Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image">
                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img style="width: 100px; border: 1px solid #000; height: 100px;" id="show_image" src="{{ (!empty($editData['student']['image'])) ? url('upload/student_images/'.$editData['student']['image']) : url('upload/no_image.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->
                                    </div>
                                </div>
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

<script>
    // Show Chosen Image Ajax
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection