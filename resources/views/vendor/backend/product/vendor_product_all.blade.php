@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">VendorAll Products</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('vendor.add.product') }}" class="btn btn-primary">Add Product</a>
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
                                <th>Image </th>
                                <th>Product Name </th>
                                <th>Price </th>
                                <th>QTY </th>
                                <th>Discount </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 70px; height:40px;">
                                    </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->product_qty }}</td>

                                    <td>
                                        @if ($item->discount_price == null)
                                            <span class="badge rounded-pill bg-info">No Discount</span>
                                        @else
                                            @php
                                                $amount = $item->selling_price - $item->discount_price;
                                                $discount = ($amount / $item->selling_price) * 100;
                                            @endphp
                                            <span class="badge rounded-pill bg-danger"> {{ round($discount) }}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">InActive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('vendor.edit.product', $item->id) }}" class="parent-icon"
                                            title="Edit Data"> <i class='bx bxs-edit'></i> </a>

                                        <a href="{{ route('vendor.delete.product', $item->id) }}" class="parent-icon"
                                            id="delete" title="Delete Data"><i class='bx bx-trash'></i></a>

                                        <a href="{{ route('edit.category', $item->id) }}" class="parent-icon"
                                            title="Details Page"> <i class='bx bx-show'></i> </a>

                                        @if ($item->status == 1)
                                            <a href="{{ route('vendor.product.inactive', $item->id) }}"
                                                class="parent-icon"
                                                title="Inactive"><i class='bx bx-toggle-right'></i> </a>
                                        @else
                                            <a href="{{ route('vendor.product.active', $item->id) }}"
                                                class="parent-icon"
                                                title="Active"><i class='bx bx-toggle-left'> </i> </a>
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
