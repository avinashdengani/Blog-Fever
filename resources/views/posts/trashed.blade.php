@extends('layouts.admin-panel.app')
@section('title', 'Blog-Fever | Posts')
@section('content')
<div class="card">
    <div class="card-header"><h2>Trash Posts</h2></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ asset($post->image_path) }}" width="120"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->excerpt}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>
                            <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-primary btn-sm fa fa-trash-restore"></button>
                            </form>

                            <button type="button" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="displayModal({{ $post->id }})" data-toggle="modal" data-target="#deleteModal"></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="deletePostForm">
            @csrf
            @method('DELETE')
        <div class="modal-body">
          Are you sure, you want to delete this Post?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-danger">Delete Post</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<div class="mt-5">
    {{ $posts->links('vendor.pagination.bootstrap-4') }}
</div>

@endsection

@section('page-level-scripts')
<script>
    function displayModal(postId) {
        var url = "/posts/" + postId;
        $("#deletePostForm").attr('action', url);
    }
</script>
@endsection
