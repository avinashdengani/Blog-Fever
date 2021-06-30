@extends('layouts.admin-panel.app')
@section('title', 'Blog-Fever | Tags')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('tags.create')}}" class="btn btn-outline-primary" >Add Tag</a>
</div>
<div class="card">
    <div class="card-header">
        <h2>Tags</h2>
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
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-outline-warning btn-sm fa fa-edit" ></a>
                        <button type="button" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="displayModal({{$tag->id}})" data-toggle="modal" data-target="#deleteModal"></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

    <!--Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="deleteTagForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5 class="text-danger" >Are you sure, you want to delete Tag?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Delete tag</button>
                </div>
            </form>
          </div>
        </div>
      </div>

  <div class="mt-5 pagination">
    {{$tags->links('vendor.pagination.bootstrap-4')}}
  </div>
@endsection

@section('page-level-scripts')
  <script>
      function displayModal(tagId) {
        var url = "/tags/" + tagId;
        console.log(url);
        $("#deleteTagForm").attr('action', url);
      }
  </script>
@endsection
