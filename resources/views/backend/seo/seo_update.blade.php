@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <h5 class="card-title mb-4">Seo Setting</h5>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="card-body border border-1 p-4 rounded">
                        <form method="post" action="{{ route('seo.setting.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $seo->id }}">
							<div class="form-group mb-3">
                                <label class="form-label">Meta Title</label>
								<input type="text" class="form-control" name="meta_title"
								value="{{ $seo->meta_title }}" />
                            </div>
							<div class="form-group mb-3">
                                <label class="form-label">Meta Author</label>
								<input type="text" name="meta_author" class="form-control"
                                        value="{{ $seo->meta_author }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Meta Keyword</label>
								<input type="text" name="meta_keyword" class="form-control"
                                        value="{{ $seo->meta_keyword }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Meta Description</label>
								<input type="text" name="meta_description" class="form-control"
                                        value="{{ $seo->meta_description }}" />
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
@endsection
