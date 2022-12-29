@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <h5 class="card-title mb-4">All Role</h5>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Roles Name </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('edit.roles', $item->id) }}" class="parent-icon" title="Edit Data">
                                            <i class='bx bxs-edit'></i> </a>
                                        <a href="{{ route('delete.roles', $item->id) }}" class="parent-icon" id="delete"
                                            title="Delete Data"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
