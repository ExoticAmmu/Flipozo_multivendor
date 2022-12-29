@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <h5 class="card-title mb-4">All User Data</h5>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image </th>
                                <th>Name </th>
                                <th>Email </th>
                                <th>Phone </th>
                                <th>Last Seen </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> <img
                                            src="{{ !empty($item->photo) ? url('upload/user_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="60"
                                            height="60"></td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->phone }} </td>
                                    <td>
                                        @if ($item->UserOnline())
                                            <span class="badge badge-pill bg-success">Active Now </span>
                                        @else
                                            <span class="badge badge-pill bg-danger">
                                                {{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }} </span>
                                        @endif
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
