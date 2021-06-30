@extends('layouts.admin-panel.app')

@section('page-level-styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h2>Add New Post</h2></div>
            <div class="card-body">
            <form action="{{  route('posts.update', $post->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            value="{{old('title', $post->title)}}"
                            placeholder="Enter Post Title"
                            id="title">
                    @error('title')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <input type="text"
                            class="form-control @error('excerpt') is-invalid @enderror"
                            name="excerpt"
                            value="{{old('excerpt', $post->excerpt)}}"
                            placeholder="Enter Post Excerpt"
                            id="excerpt">
                    @error('excerpt')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="hidden" id="content" name="content" value="{{old('content', $post->content)}}"">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category_id" id="category_id" class="form-control select2">
                        <option></option>
                        @foreach ($categories as $category)
                            @if($category->id == old('category_id', $category->id))
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control select2" multiple>
                        <option></option>
                        @foreach ($tags as $tag)
                        @if((old('tags') && (in_array($tag->id, old('tags')))) || $post->hasTag($tag->id))
                            <option value="{{$tag->id}}" selected>
                                {{$tag->name}}
                            </option>
                        @else
                            <option value="{{$tag->id}}">
                                {{$tag->name}}
                            </option>
                        @endif
                        @endforeach
                    </select>
                    @error('tags')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text"
                            class="form-control"
                            name="published_at"
                            value="{{ old('published_at', $post->published_at) }}"
                            id="published_at">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"
                            class="form-control @error('image') is-invalid @enderror"
                            name="image"
                            id="image">
                    @error('image')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-warning mt-2">Edit Post</button>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('page-level-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script>
        $('.select2').select2({
            placeholder: 'Select an option',
            allowClear: true
        });
        flatpickr("#published_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });
    </script>
@endsection
