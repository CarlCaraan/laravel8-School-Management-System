@extends('admin.admin_master')

@section('title') Edit Other Cost | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Other Cost</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('other.cost.update', $editData->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Amount<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="amount" class="form-control" value="{{ $editData->amount }}">
                                                    </div>
                                                    @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Date<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control" value="{{ $editData->date }}">
                                                    </div>
                                                    @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Col -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Image<span class="text-danger">*</span></h5>
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
                                                        <img style="width: 70px; height: 50px; margin-top: 25px;" id="show_image" src="{{ (!empty($editData->image)) ? url('upload/cost_images/'.$editData->image) : url('upload/no_image.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div> <!-- End Col -->
                                        </div> <!-- End Row -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Description<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="description" id="description" class="form-control" required="" aria-invalid="false">{{ $editData->description }}</textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                    @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

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