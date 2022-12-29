@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit Banner</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $banner->id }}">
                            <input type="hidden" name="old_img" value="{{ $banner->banner_image }}">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Banner Title</label>
                                <input type="text" name="banner_title" class="form-control"
                                    value="{{ $banner->banner_title }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Banner Url</label>
                                <input type="text" name="banner_url" class="form-control"
                                    value="{{ $banner->banner_url }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Banner Image</label>
                                <input type="file" name="brand_image" class="form-control" id="image" />
                            </div>
                            <div class="form-group mb-3">
                                <img id="showImage" src="{{ asset($banner->banner_image) }}" alt="Admin"
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
                    banner_title: {
                        required: true,
                    },
                    banner_url: {
                        required: true,
                    },
                },
                messages: {
                    banner_title: {
                        required: 'Please Enter Banner Title',
                    },
                    banner_url: {
                        required: 'Please Enter Banner URL ',
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
