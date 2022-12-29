@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit Permission</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.permission') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <div class="form-group mb-3">
                                <label class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Group Name</label>
                                <select name="group_name" class="form-select mb-3" aria-label="Default select example">
                                    <option selected="">Open this select Group</option>
                                    <option value="brand" {{ $permission->group_name == 'brand' ? 'selected' : '' }}>
                                        Brand</option>
                                    <option value="category"{{ $permission->group_name == 'category' ? 'selected' : '' }}>
                                        Category</option>
                                    <option
                                        value="subcategory"{{ $permission->group_name == 'subcategory' ? 'selected' : '' }}>
                                        Subcategory</option>
                                    <option value="product"{{ $permission->group_name == 'product' ? 'selected' : '' }}>
                                        Product</option>
                                    <option value="slider"{{ $permission->group_name == 'slider' ? 'selected' : '' }}>
                                        Slider</option>
                                    <option value="ads"{{ $permission->group_name == 'ads' ? 'selected' : '' }}>
                                        Ads</option>
                                    <option value="coupon"{{ $permission->group_name == 'coupon' ? 'selected' : '' }}>
                                        Coupon</option>
                                    <option value="area"{{ $permission->group_name == 'area' ? 'selected' : '' }}>
                                        Area</option>
                                    <option value="vendor"{{ $permission->group_name == 'vendor' ? 'selected' : '' }}>
                                        Vendor</option>
                                    <option value="order"{{ $permission->group_name == 'order' ? 'selected' : '' }}>
                                        Order</option>
                                    <option value="return"{{ $permission->group_name == 'return' ? 'selected' : '' }}>
                                        Return</option>
                                    <option value="report"{{ $permission->group_name == 'report' ? 'selected' : '' }}>
                                        Report</option>
                                    <option value="user"{{ $permission->group_name == 'user' ? 'selected' : '' }}>
                                        User Management</option>
                                    <option value="review"{{ $permission->group_name == 'review' ? 'selected' : '' }}>
                                        Review</option>
                                    <option value="setting"{{ $permission->group_name == 'setting' ? 'selected' : '' }}>
                                        Setting</option>
                                    <option value="blog"{{ $permission->group_name == 'blog' ? 'selected' : '' }}>
                                        Blog</option>
                                    <option value="role"{{ $permission->group_name == 'role' ? 'selected' : '' }}>
                                        Role</option>
                                    <option value="admin"{{ $permission->group_name == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="stock"{{ $permission->group_name == 'stock' ? 'selected' : '' }}>
                                        Stock</option>
                                </select>
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
