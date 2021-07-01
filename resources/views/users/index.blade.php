@extends('layouts.admin-panel.app')
@section('title', 'Blog-Fever | users')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>users</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">posts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->posts->count() }}</td>
                    <td>
                        @if (! $user->isAdmin())
                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-success btn-sm">MAKE ADMIN</button>
                            </form>
                        @else
                            <form action="{{ route('users.revoke-admin', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-danger btn-sm">REVOKE ADMIN</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="mt-5 pagination">
    {{$users->links('vendor.pagination.bootstrap-4')}}
  </div>
@endsection

