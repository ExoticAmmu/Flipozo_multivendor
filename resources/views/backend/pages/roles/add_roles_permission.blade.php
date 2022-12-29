@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">
        <h5 class="card-title mb-4">Add Roles Permission</h5>
        <div class="container-fluid">
            <div class="form-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('role.permission.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Roles Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <select name="role_id" class="form-select mb-3" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                                <label class="form-check-label" for="flexCheckDefaultAll">All Permission</label>
                            </div>
                            <hr>

                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <!--  // Start row  -->
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label"
                                                for="flexCheckDefault">{{ $group->group_name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-9">

                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp

                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission[]" type="checkbox"
                                                    value="{{ $permission->id }}"
                                                    id="flexCheckDefault{{ $permission->id }}">
                                                <label class="form-check-label"
                                                    for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>
                                </div><!--  // end row  -->
                            @endforeach


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
        $('#flexCheckDefaultAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked', true);
            } else {
                $('input[type = checkbox]').prop('checked', false);
            }
        });
    </script>
@endsection
