@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit Division</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.division') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $division->id }}">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Division Name</label>
                                <input type="text" name="division_name" class="form-control"
                                    value="{{ $division->division_name }}" />
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#myForm').validate({
                    rules: {
                        division_name: {
                            required: true,
                        },

                    },
                    messages: {
                        division_name: {
                            required: 'Please Enter Division Name',
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>
    @endsection
