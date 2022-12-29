@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Add Permission</h5>

        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('store.permission') }}">
                            @csrf
							<div class="form-group mb-3">
                                <label class="form-label">Permission Name</label>
								<input type="text" name="name" class="form-control" />
                            </div>
							<div class="form-group mb-3">
                                <label class="form-label">Group Name</label>
								<select name="group_name" class="form-select mb-3" aria-label="Default select example">
									<option selected="">Open this select Group</option>
									<option value="brand">Brand</option>
									<option value="category">Category</option>
									<option value="subcategory">Subcategory</option>
									<option value="product">Product</option>
									<option value="slider">Slider</option>
									<option value="ads">Ads</option>
									<option value="coupon">Coupon</option>
									<option value="area">Area</option>
									<option value="vendor">Vendor</option>
									<option value="order">Order</option>
									<option value="return">Return</option>
									<option value="report">Report</option>
									<option value="user">User Management</option>
									<option value="review">Review</option>
									<option value="setting">Setting</option>
									<option value="blog">Blog</option>
									<option value="role">Role</option>
									<option value="admin">Admin</option>
									<option value="stock">Stock</option>
								</select>
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
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Permission Name',
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
