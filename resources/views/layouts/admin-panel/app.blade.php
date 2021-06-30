<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin-panel/css/bootstrap.min.css') }}" crossorigin="anonymous">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('page-level-styles')

    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Blog Fever Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{ auth()->user()->name }}
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <form action="{{ route('logout') }}" method="POST">
                           @csrf
                           <input type="submit" class="dropdown-item" value="Logout">
                       </form>

                   </div>
               </li>
           </ul>
       </div>
   </div>
</nav>
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('posts.index')}}" class="nav-link">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tags.index')}}" class="nav-link">Tags</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @include('layouts.partials._message')
            @yield('content')
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- My script to delete category-->
@yield('page-level-scripts')
</body>
</html>
