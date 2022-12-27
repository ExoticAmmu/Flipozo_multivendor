@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Add New State</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('store.state') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Division Name</label>
                                <select name="division_id" class="form-select mb-3" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>

                                    @foreach ($division as $item)
                                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">District Name</label>
                                <select name="district_id" class="form-select mb-3" aria-label="Default select example">

                                    <option> </option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">State Name</label>
                                <input type="text" name="state_name" class="form-control" />
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


        <script type="text/javascript">
            $(document).ready(function() {
                $('#myForm').validate({
                    rules: {
                        state_name: {
                            required: true,
                        },
                    },
                    messages: {
                        state_name: {
                            required: 'Please Enter State Name',
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
                $('select[name="division_id"]').on('change', function() {
                    var division_id = $(this).val();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/district/ajax') }}/" + division_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="district_id"]').html('');
                                var d = $('select[name="district_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="district_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .district_name + '</option>');
                                });
                            },

                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>
    @endsection
