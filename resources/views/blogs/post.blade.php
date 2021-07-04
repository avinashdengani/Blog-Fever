@extends('layouts.frontend.layouts')
@section('title', 'blog-Fever | Post')
@section('page-header')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="{{asset('frontend/assets/img/bg/img-bg-17.jpg')}}" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                            Blog Post
                            <small class="color-light alpha7">Articulated for You with &hearts;</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>
@endsection

<!-- Blog Area ===================================== -->
@section('main-content')
    <div class="blog-three-mini">
        <h2 class="color-dark"><a href="#">{{ $post->title }}</a></h2>
        <div class="blog-three-attrib">
            <div><i class="fa fa-calendar"></i>{{ $post->published_at->diffForHumans() }} </div> |
            <div><i class="fa fa-pencil"></i><a href="#user-image">{{ $post->author->name }}</a></div> |
            <div><i class="fa fa-comment-o"></i><a href="#comment-box">Comments</a></div> |
            <div><a href="#"><i class="fa fa-thumbs-o-up"></i></a>150 Likes</div> |
            <div>
                Share:  <a href="#"><i class="fa fa-facebook-official"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>

        <img src="{{asset($post->image_path)}}" alt="Blog Image" class="img-responsive">

        <div class="blog-post-content">
            <div class="col mt50">
                {!! $post->content !!}
            </div>
        </div>

        <div class="blog-post-read-tag mt50">
            <i class="fa fa-tags"></i>
            Tags:
            @foreach ($post->tags as $tag)
                <a href="#">{{ $tag->name }}</a>
            @endforeach
        </div>

    </div>


    <div class="blog-post-author mb50 pt30 bt-solid-1" id="user-image">
        <img src="{{ $post->author->gravatar_image }}" alt="user-image">
        <span class="blog-post-author-name">{{ $post->author->name }}</span> <a href="https://twitter.com/booisme"><i class="fa fa-twitter"></i></a>
        <p>
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>
    </div>

<div class="blog-post-comment-container" id="comment-box">
    <div id="disqus_thread"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        var disqus_config = function () {
            this.page.url = "{{ route('blogs.show', $post->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://blog-fever.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


</div>
@endsection
