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
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
@endsection
