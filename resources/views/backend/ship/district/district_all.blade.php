@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All District</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.district') }}" class="btn btn-primary">Add District</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Division Name </th>
                                <th>District Name </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($district as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item['division']['division_name'] }}</td>
                                    <td> {{ $item->district_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.district', $item->id) }}" class="parent-icon"
                                            title="Edit Data"> <i class='bx bxs-edit'></i> </a>
                                        <a href="{{ route('delete.district', $item->id) }}" class="parent-icon"
                                            id="delete" title="Delete Data"><i class='bx bx-trash'></i></a>

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
