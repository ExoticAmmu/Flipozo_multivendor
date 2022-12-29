@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <h5 class="card-title mb-4">All Return Order</h5>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Date </th>
                                <th>Invoice </th>
                                <th>Amount </th>
                                <th>Payment </th>
                                <th>State </th>
                                <th>Reason </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>${{ $item->amount }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>
                                        @if ($item->return_order == 1)
                                            <span class="badge rounded-pill bg-danger"> Pending </span>
                                        @elseif($item->return_order == 2)
                                            <span class="badge rounded-pill bg-success"> Success </span>
                                        @endif
                                    </td>

                                    <td>{{ $item->return_reason }}</td>

                                    <td>
                                        <a href="{{ route('admin.order.details', $item->id) }}" class="parent-icon"
                                            title="Details"><i class='bx bx-show'></i> </a>

                                        <a href="{{ route('return.request.approved', $item->id) }}" class="parent-icon"
                                            title="Approved" id="approved"><i class='bx bx-check-circle'></i></a>
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
