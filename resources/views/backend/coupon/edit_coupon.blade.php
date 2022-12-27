@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit Coupon</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.coupon') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $coupon->id }}">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Coupon Name</label>
                                <input type="text" name="coupon_name" class="form-control"
                                    value="{{ $coupon->coupon_name }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Coupon Discount(%)</label>
                                <input type="text" name="coupon_discount" class="form-control"
                                    value="{{ $coupon->coupon_discount }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Coupon Validity Date</label>
                                <input type="date" name="coupon_validity" class="form-control"
                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                    value="{{ $coupon->coupon_validity }}" />
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
                    coupon_name: {
                        required: true,
                    },
                    coupon_discount: {
                        required: true,
                    },
                },
                messages: {
                    coupon_name: {
                        required: 'Please Enter Coupon Name',
                    },
                    coupon_discount: {
                        required: 'Please Enter Coupon Discount',
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
