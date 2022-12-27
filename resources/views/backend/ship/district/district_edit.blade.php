@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit District</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('update.district') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $district->id }}">
							<div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Division Name</label>
                                <select name="division_id" class="form-select mb-3" aria-label="Default select example">
									<option selected="">Open this select menu</option>

									@foreach ($division as $item)
										<option value="{{ $item->id }}"
											{{ $item->id == $district->division_id ? 'selected' : '' }}>
											{{ $item->division_name }}</option>
									@endforeach
								</select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">District Name</label>
                                <input type="text" name="district_name" class="form-control"
                                        value="{{ $district->district_name }}" />
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
                        district_name: {
                            required: true,
                        },
                    },
                    messages: {
                        district_name: {
                            required: 'Please Enter District Name',
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
