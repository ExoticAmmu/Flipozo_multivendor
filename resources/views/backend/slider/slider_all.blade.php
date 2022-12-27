@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All Slider</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.slider') }}" class="btn btn-primary">Add Slider</a>
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
                                <th>Slider Title </th>
                                <th>Short Title </th>
                                <th>Slider Image </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->slider_title }}</td>
                                    <td>{{ $item->short_title }}</td>
                                    <td> <img src="{{ asset($item->slider_image) }}" style="width: 80px; height:50px;">
                                    </td>

                                    <td>
                                        @if (Auth::user()->can('slider.edit'))
                                            <a href="{{ route('edit.slider', $item->id) }}" class="parent-icon"
                                                title="Edit Data"> <i class='bx bxs-edit'></i></a>
                                        @endif
                                        @if (Auth::user()->can('slider.delete'))
                                            <a href="{{ route('delete.slider', $item->id) }}" class="parent-icon"
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
