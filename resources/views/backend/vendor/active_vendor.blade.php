@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All Active Vendor</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Shop Name </th>
                                <th>Vendor Username </th>
                                <th>Join Date </th>
                                <th>Vendor Email </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ActiveVendor as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->name }}</td>
                                    <td> {{ $item->username }}</td>
                                    <td> {{ $item->vendor_join }}</td>
                                    <td> {{ $item->email }} </td>
                                    <td> <span class="badge rounded-pill bg-success">{{ $item->status }}</span> </td>

                                    <td>
                                        <a href="{{ route('active.vendor.details', $item->id) }}" class="parent-icon"
                                            title="Edit Data"> <i class='bx bxs-edit'></i> </a>

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
