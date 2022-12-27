@extends('admin.admin_dashboard')
@section('admin')
    @php
        $date = date('d-m-y');
        $today = App\Models\Order::where('order_date', $date)->sum('amount');
        
        $month = date('F');
        $month = App\Models\Order::where('order_month', $month)->sum('amount');
        
        $year = date('Y');
        $year = App\Models\Order::where('order_year', $year)->sum('amount');
        
        $pending = App\Models\Order::where('status', 'pending')->get();
        
        $vendor = App\Models\User::where('status', 'active')
            ->where('role', 'vendor')
            ->get();
        
        $customer = App\Models\User::where('status', 'active')
            ->where('role', 'user')
            ->get();
        
    @endphp

    <div class="page-content">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Today's Sale</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">{{ $today }}</span> </h4>
                                <a href="" class="text-decoration-underline">View net earnings</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success rounded fs-3">
                                    <i class="bx bx-dollar-circle text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                             <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Monthly Sale</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-danger fs-14 mb-0">
                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="36894">{{ $month }}</span></h4>
                                <a href="" class="text-decoration-underline">View all orders</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded fs-3">
                                    <i class="bx bx-shopping-bag text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Yearly Sale</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="183.35">{{ $year }}</span></h4>
                                <a href="" class="text-decoration-underline">See details</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                    <i class="bx bx-user-circle text-warning"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Balance</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-muted fs-14 mb-0">
                                    +0.00 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="165.89">0</span>k </h4>
                                <a href="" class="text-decoration-underline">Withdraw money</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                    <i class="bx bx-wallet text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div> <!-- end row-->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Earnings</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">0</span>k </h4>
                                <a href="" class="text-decoration-underline">View net earnings</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success rounded fs-3">
                                    <i class="bx bx-dollar-circle text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                             <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Pending Orders</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-danger fs-14 mb-0">
                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="36894">{{ count($pending) }}</span></h4>
                                <a href="" class="text-decoration-underline">View all orders</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded fs-3">
                                    <i class="bx bx-shopping-bag text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total User</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="183.35">{{ count($customer) }}</span> </h4>
                                <a href="" class="text-decoration-underline">All Users</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                    <i class="bx bx-user-circle text-warning"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Vendor</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-muted fs-14 mb-0">
                                    +0.00 %
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="165.89">{{ count($vendor) }}</span> </h4>
                                <a href="" class="text-decoration-underline">Vendor List</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                    <i class="bx bx-wallet text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div> <!-- end row-->

        @php
            
            $orders = App\Models\Order::where('status', 'pending')
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->get();
        @endphp

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Orders Summary</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>${{ $order->amount }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        <div class="badge rounded-pill bg-light-info text-info w-100">
                                            {{ $order->status }}</div>
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
