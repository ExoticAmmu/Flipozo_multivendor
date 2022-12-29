@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <h5 class="card-title mb-4">Vendor Approve Review</h5>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image </th>
                                <th>Product </th>
                                <th>User </th>
                                <th>Comment </th>
                                <th>Rating </th>
                                <th>Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> <img src="{{ asset($item['product']['product_thambnail']) }}"
                                            style="width: 40px; height:40px;"></td>
                                    <td>{{ $item['product']['product_name'] }}</td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>{{ Str::limit($item->comment, 25) }}</td>
                                    <td>
                                        @if ($item->rating == null)
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 1)
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 3)
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 3)
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 4)
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 5)
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                        @elseif($item->status == 1)
                                            <span class="badge rounded-pill bg-warning">Publish</span>
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
