@extends('layouts.admin-panel.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('categories.create')}}" class="btn btn-outline-primary" >Add Category</a>
</div>
<div class="card">
    <div class="card-header">
        <h2>Categories</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm fa fa-edit" ></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="mt-5 pagination">
    {{$categories->links('vendor.pagination.bootstrap-4')}}
  </div>
@endsection
