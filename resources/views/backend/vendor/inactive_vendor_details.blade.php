@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="page-content">
            <h5 class="card-title mb-4">Inactive Vendor Details</h5>
            <div class="container-fluid">
                <div class="main-body">
                    <div class="row">
                        <div class="card-body border border-1 p-4 rounded">
                            <form method="post" action="{{ route('active.vendor.approve') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $inactiveVendorDetails->id }}">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">User Name</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ $inactiveVendorDetails->username }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Shop Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $inactiveVendorDetails->name }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $inactiveVendorDetails->email }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $inactiveVendorDetails->phone }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $inactiveVendorDetails->address }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Join</label>
                                    <input type="text" name="vendor_join" class="form-control"
                                        value="{{ $inactiveVendorDetails->vendor_join }}" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Vendor Info</label>
                                    <textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3">
										{{ $inactiveVendorDetails->vendor_short_info }}
									</textarea>
                                </div>
								<div class="form-group mb-3">
									<label for="inputProductTitle" class="form-label">Vendor Image</label>
								</div>
								<div class="form-group mb-3">
									<img id="showImage"
                                            src="{{ !empty($inactiveVendorDetails->photo) ? url('upload/vendor_images/' . $inactiveVendorDetails->photo) : url('upload/no_image.jpg') }}"
                                            alt="Vendor" style="width:150px; height: 150px;">
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
									<input type="submit" class="btn btn-success px-4" value="InActive Vendor" />
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
