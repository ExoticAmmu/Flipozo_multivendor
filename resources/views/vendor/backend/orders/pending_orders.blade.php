@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <h5 class="card-title mb-4">All Vendor Pending Order</h5>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitem as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item['order']['order_date'] }}</td>
                                    <td>{{ $item['order']['invoice_no'] }}</td>
                                    <td>${{ $item['order']['amount'] }}</td>
                                    <td>{{ $item['order']['payment_method'] }}</td>
                                    <td> <span class="badge rounded-pill bg-success"> {{ $item['order']['status'] }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('vendor.order.details', $item->order->id) }}" class="parent-icon"
                                            title="Details"><i class='bx bx-show' ></i> </a>
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
