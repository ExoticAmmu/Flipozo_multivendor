@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Add Blog Post</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('store.blog.post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Blog Category</label>
                                <select name="category_id" class="form-select" id="inputVendor">
                                    <option></option>
                                    @foreach ($blogcategory as $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->blog_category_name }}</option>
                                    @endforeach
								</select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Blog PosT</label>
                                <input type="text" name="post_title" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Blog Short Decs</label>
                                <textarea name="post_short_description" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Blog Long Decs</label>
                                <textarea id="editor" name="post_long_description">
										</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Blog Post Image</label>
                            </div>
                            <div class="form-group mb-3">
                                <input type="file" name="post_image" class="form-control" id="image" />
                            </div>
							<div class="form-group mb-3">
								<img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
								style="width:100px; height: 100px;">
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
