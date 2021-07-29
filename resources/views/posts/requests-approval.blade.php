@extends('layouts.admin-panel.app')
@section('title', 'Blog-Fever | Posts')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Requested Posts</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Category</th>
                    <th>Author</th>
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
                        <td>{{$post->author->name}}</td>

                        <td>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                            <form action="{{route('posts.requests.approve', $post->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-success btn-sm fa fa-check"></button>
                            </form>
                            <form action="{{ route('posts.requests.disapprove', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button  type="submit" class="btn btn-outline-danger btn-sm fa fa-ban"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
