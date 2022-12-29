@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <h5 class="card-title mb-4">Site Setting</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form method="post" action="{{ route('site.setting.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
							<div class="form-group mb-3">
                                <label class="form-label">Support Phone</label>
                                <input type="text" class="form-control" name="support_phone"
                                        value="{{ $setting->support_phone }}" />
                            </div>
							<div class="form-group mb-3">
                                <label class="form-label">Phone One</label>
                                <input type="text" name="phone_one" class="form-control"
                                        value="{{ $setting->phone_one }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                        value="{{ $setting->email }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Company Address</label>
								<input type="text" name="company_address" class="form-control"
								value="{{ $setting->company_address }}" />
                            </div>
							<div class="form-group mb-3">
                                <label class="form-label">Facebook</label>
								<input type="text" name="facebook" class="form-control"
                                        value="{{ $setting->facebook }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Twitter</label>
								<input type="text" name="twitter" class="form-control"
								value="{{ $setting->twitter }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Youtube</label>
								<input type="text" name="youtube" class="form-control"
                                        value="{{ $setting->youtube }}" />
                            </div>
							<div class="form-group mb-3">
                                <label class="form-label">CopyRight</label>
								<input type="text" name="copyright" class="form-control"
                                        value="{{ $setting->copyright }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Logo</label>
								<input type="file" name="logo" class="form-control" id="image" />
                            </div>
                            <div class="form-group mb-3">
                                <img id="showImage" src="{{ asset($setting->logo) }}" alt="Admin"
                                        style="width:100px; height: 100px;">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
