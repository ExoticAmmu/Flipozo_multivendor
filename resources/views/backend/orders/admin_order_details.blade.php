@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <h5 class="card-title mb-4">Admin Order Details</h5>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Shipping Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 500;">
                            <tr>
                                <th>Shipping Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email:</th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Address:</th>
                                <th>{{ $order->adress }}</th>
                            </tr>
                            <tr>
                                <th>Division:</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th>District:</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>State :</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>
                            <tr>
                                <th>Post Code :</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr>
                                <th>Order Date :</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Order Details
                            <span class="text-danger">Invoice : {{ $order->invoice_no }} </span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 500;">
                            <tr>
                                <th> Name :</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone :</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment Type:</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>
                            <tr>
                                <th>Transx ID:</th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>
                            <tr>
                                <th>Invoice:</th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>
                            <tr>
                                <th>Order Amonut:</th>
                                <th>${{ $order->amount }}</th>
                            </tr>
                            <tr>
                                <th>Order Status:</th>
                                <th><span class="badge rounded-pill bg-danger" style="font-size: 15px;">{{ $order->status }}</span></th>
                            </tr>
                            <tr>
                                <th> </th>
                                <th>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('pending-confirm', $order->id) }}"
                                            class="btn btn-primary text-white" id="confirm">Confirm Order</a>
                                    @elseif($order->status == 'confirm')
                                        <a href="{{ route('confirm-processing', $order->id) }}"
                                            class="btn btn-primary text-white" id="processing">Processing Order</a>
                                    @elseif($order->status == 'processing')
                                        <a href="{{ route('processing-delivered', $order->id) }}"
                                            class="btn btn-primary text-white" id="delivered">Delivered Order</a>
                                    @endif
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
            <div class="col">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table" style="font-weight: 500;">
                            <tbody>
                                <tr>
                                    <td class="col-md-1">
                                        <label>Image </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Product Name </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Vendor Name </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Product Code </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Color </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Size </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Quantity </label>
                                    </td>
                                    <td class="col-md-3">
                                        <label>Price </label>
                                    </td>
                                </tr>
                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label><img src="{{ asset($item->product->product_thambnail) }}"
                                                    style="width:50px; height:50px;"> </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $item->product->product_name }}</label>
                                        </td>
                                        @if ($item->vendor_id == null)
                                            <td class="col-md-2">
                                                <label>Owner </label>
                                            </td>
                                        @else
                                            <td class="col-md-2">
                                                <label>{{ $item->product->vendor->name }} </label>
                                            </td>
                                        @endif

                                        <td class="col-md-2">
                                            <label>{{ $item->product->product_code }} </label>
                                        </td>
                                        @if ($item->color == null)
                                            <td class="col-md-1">
                                                <label>.... </label>
                                            </td>
                                        @else
                                            <td class="col-md-1">
                                                <label>{{ $item->color }} </label>
                                            </td>
                                        @endif

                                        @if ($item->size == null)
                                            <td class="col-md-1">
                                                <label>.... </label>
                                            </td>
                                        @else
                                            <td class="col-md-1">
                                                <label>{{ $item->size }} </label>
                                            </td>
                                        @endif
                                        <td class="col-md-1">
                                            <label>{{ $item->qty }} </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label>${{ $item->price }} <br> Total = ${{ $item->price * $item->qty }}
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
