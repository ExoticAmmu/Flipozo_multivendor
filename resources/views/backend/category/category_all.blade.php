@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All Category</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
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
                                <th>Category Name </th>
                                <th>Category Image </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->category_name }}</td>
                                    <td> <img src="{{ asset($item->category_image) }}" style="width: 50px; height:50px;">
                                    </td>
                                    <td>
                                        @if (Auth::user()->can('category.edit'))
                                            <a href="{{ route('edit.category', $item->id) }}" class="parent-icon"> <i class='bx bxs-edit'></i> </a>
                                        @endif
                                        @if (Auth::user()->can('category.delete'))
                                            <a href="{{ route('delete.category', $item->id) }}" class="parent-icon"
                                                id="delete"><i class='bx bx-trash'></i></a>
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
