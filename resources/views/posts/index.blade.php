@extends('layouts.admin-panel.app')
@section('title', 'Blog-Fever | Posts')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{route('posts.create')}}" class="btn btn-outline-primary">Add Post</a>
</div>
<div class="card">
    <div class="card-header"><h2>Published Posts</h2></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Category</th>
                    @if (auth()->user()->isAdmin())
                        <th>Author</th>
                    @else
                        <th>Status</th>
                    @endif
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
                        @if (auth()->user()->isAdmin())
                            <td>{{$post->author->name}}</td>
                        @else
                                @if ($post->approval_status == 'approved')
                                <td>
                                    <label class="text-success border border-success border-3 rounded-pill p-1">{{$post->approval_status}}</label>
                                </td>
                                @elseif ($post->approval_status == 'disapproved')
                                    <td>
                                        <label class="text-danger border border-danger border-3 rounded-pill p-1">{{$post->approval_status}}</label>
                                    </td>
                                @else
                                    <td>
                                        <label class="text-warning border border-warning border-3 rounded-pill p-1 ">{{$post->approval_status}}</label>
                                    </td>
                                @endif
                        @endif
                        <td>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm fa fa-edit {{$post->user_id == auth()->id() ? '' : 'disabled'}}"></a>
                            @if (!($post->user_id == auth()->id()) && (auth()->user()->isAdmin()))
                                <form action="{{ route('posts.requests.disapprove', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button  type="submit" class="btn btn-outline-danger btn-sm fa fa-ban"></button>
                                </form>
                            @else
                                <button type="button" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="displayModal({{ $post->id }})" data-toggle="modal" data-target="#deleteModal"></button>
                            @endif
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
        <form action="" method="POST" id="trashPostForm">
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
        var url = "/posts/trash/" + postId;
        $("#trashPostForm").attr('action', url);
    }
</script>
@endsection
