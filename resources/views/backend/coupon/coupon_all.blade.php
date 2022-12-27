@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All Coupon</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.coupon') }}" class="btn btn-primary">Add Coupon</a>
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
                                <th>Coupon Name </th>
                                <th>Coupon Discount </th>
                                <th>Coupon Validity </th>
                                <th>Coupon Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupon as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->coupon_name }}</td>
                                    <td> {{ $item->coupon_discount }}% </td>
                                    <td> {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }} </td>
                                    <td>
                                        @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge rounded-pill bg-success">Valid</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Invalid</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if (Auth::user()->can('coupon.edit'))
                                            <a href="{{ route('edit.coupon', $item->id) }}" class="parent-icon"
                                                title="Edit Data"> <i class='bx bxs-edit'></i>
                                                </a>
                                        @endif
                                        @if (Auth::user()->can('coupon.delete'))
                                            <a href="{{ route('delete.coupon', $item->id) }}" class="parent-icon"
                                                id="delete" title="Delete Data"><i class='bx bx-trash'></i></a>
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
