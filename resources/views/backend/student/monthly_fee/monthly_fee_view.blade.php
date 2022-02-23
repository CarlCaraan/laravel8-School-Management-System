@extends('admin.admin_master')

@section('title') Student Monthly Fee | ASMS @endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <!-- Start Student Search  -->
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Monthly Fee</strong></h4>
                        </div>

                        <div class="box-body">
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
                                        @error('year_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                        @error('class_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- End Col -->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Month</h5>
                                        <div class="controls">
                                            <select name="month" id="month" class="form-control">
                                                <option value="" selected="" disabled="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        @error('class_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- End Col -->
                                <div class="col-md-3" style="padding-top: 25px">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div> <!-- End Col -->
                            </div> <!-- End Row -->

                            <!-- Start Roll Generate Table -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <!-- Start HandlebarsJS -->
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <table class="table table-bordered table-stripped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            @{{{thsource}}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @{{#each this}}
                                                        <tr>
                                                            @{{{tdsource}}}
                                                        </tr>
                                                        @{{/each}}
                                                    </tbody>
                                                </table>
                                            </script>
                                        <!-- End HandlebarsJS -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Roll Generate Table -->
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

<!-- Start Handlebars Get Data  -->
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var month = $('#month').val();
        $.ajax({
            url: "{{ route('student.monthly.fee.classwise.get')}}",
            type: "get",
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'month': month
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
<!-- End Handlebars Get Data  -->
@endsection