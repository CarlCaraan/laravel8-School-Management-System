@extends('admin.admin_master')

@section('title') Add Employee | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Employee</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.registration.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control">
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
                                                        <input type="text" name="father_name" class="form-control">
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
                                                        <input type="text" name="mother_name" class="form-control">
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
                                                        <input type="text" name="mobile" class="form-control">
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
                                                        <input type="text" name="address" class="form-control">
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
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
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
                                                            <option value="Catholic">Catholic</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Hindu">Hindu</option>
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
                                                        <input type="date" name="dob" class="form-control">
                                                    </div>
                                                    @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designation<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Designation</option>
                                                            @foreach ($designations as $designation)
                                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('designation_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Salary<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" class="form-control">
                                                    </div>
                                                    @error('salary')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Joining Date<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date" class="form-control">
                                                    </div>
                                                    @error('join_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-3">
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

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img style="width: 100px; border: 1px solid #000; height: 100px;" id="show_image" src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                    </div>
                                </div>
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