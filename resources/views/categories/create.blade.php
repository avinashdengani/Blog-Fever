@extends('layouts.admin-panel.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Category</h2>
    </div>
    <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    value="{{old('name')}}"
                    placeholder="Enter Categroy Name"
                    name="name">
                    @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <button type="submit" class="btn btn-outline-success mt-2">Submit</button>
          </form>
    </div>
  </div>
@endsection
