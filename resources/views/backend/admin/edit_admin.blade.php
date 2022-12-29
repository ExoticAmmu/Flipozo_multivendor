@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Edit Admin User</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form method="post" action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Asign Roles</label>
                                <select name="roles" class="form-select mb-3" aria-label="Default select example">

                                    <option selected="">Open this select menu</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
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
@endsection
