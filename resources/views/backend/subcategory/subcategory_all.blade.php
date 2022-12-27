@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="d-none d-sm-flex align-items-center mb-3">
            <h5 class="card-title">All SubCategory</h5>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.subcategory') }}" class="btn btn-primary">Add SubCategory</a>
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
                                <th>SubCategory Name </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item['category']['category_name'] }}</td>
                                    <td> {{ $item->subcategory_name }} </td>
                                    <td>
                                        @if (Auth::user()->can('subcategory.edit'))
                                            <a href="{{ route('edit.subcategory', $item->id) }}"
                                                class="parent-icon"> <i class='bx bxs-edit'></i> </a>
                                        @endif
                                        @if (Auth::user()->can('subcategory.delete'))
                                            <a href="{{ route('delete.subcategory', $item->id) }}" class="parent-icon"
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
