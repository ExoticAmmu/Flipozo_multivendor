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
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form id="myForm" method="post" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
							<div class="form-group mb-3">
                                <label class="form-label">Roles Name</label>
                                <input type="text" name="name" value="{{ $role->name }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                                <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
                            </div>
                            <hr>
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <!--  // Start row  -->
                                    <div class="col-3">
                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault"
                                                {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="flexCheckDefault">{{ $group->group_name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission[]"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                    type="checkbox" value="{{ $permission->id }}"
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
