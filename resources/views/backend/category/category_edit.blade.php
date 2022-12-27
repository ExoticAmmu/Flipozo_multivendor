@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div>
            <h5 class="card-title mb-4">Edit Category</h5>
        </div>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.category') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <input type="hidden" name="old_image" value="{{ $category->category_image }}">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    value="{{ $category->category_name }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Category Image</label>
                                <input type="file" name="category_image" class="form-control" id="image" />
                            </div>
                            <div class="form-group mb-3">
                                <img id="showImage" src="{{ asset($category->category_image) }}" alt="Admin"
                                    style="width:150px; height: 150px;">
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
    </div>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_name: {
                        required: true,
                    },
                },
                messages: {
                    category_name: {
                        required: 'Please Enter Category Name',
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
