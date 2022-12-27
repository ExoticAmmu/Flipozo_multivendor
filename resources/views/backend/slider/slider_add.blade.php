@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Add New Slider</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('store.slider') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Slider Title</label>
                                <input type="text" name="slider_title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Short Title</label>
                                <input type="text" name="short_title" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Slider Image</label>
                                <input type="file" name="slider_image" class="form-control" id="image" />
                            </div>
                            <div class="form-group mb-3">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                    style="width:150px; height: 150px;">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    slider_title: {
                        required: true,
                    },
                    short_title: {
                        required: true,
                    },
                },
                messages: {
                    slider_title: {
                        required: 'Please Enter Slider Title',
                    },
                    short_title: {
                        required: 'Please Enter Short Title',
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




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
