@extends('administrator.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mt-5">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                Posts
            </div>
            <div class="card-body">
                @role('Editor')
                <h5 class="card-title">{{ $post }} Post</h5>
                @else
                    <h5 class="card-title">{{ $post }} Post</h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm rightButton">View</a>
                @endrole
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                Tags
            </div>
            <div class="card-body">
                @role('Editor')
                <h5 class="card-title">{{ $tag }} Tags</h5>
                @else
                    <h5 class="card-title">{{ $tag }} Tags</h5>
                    <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">View</a>
                @endrole
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                @role('Editor')
                <h5 class="card-title">{{ $category }} Categories</h5>
                @else
                    <h5 class="card-title">{{ $category }} Categories</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">View</a>
                @endrole
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                @role('Editor')
                <h5 class="card-title">{{ $users }} Users</h5>
                @else
                    <h5 class="card-title">{{ $users }} Users</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">View</a>
                @endrole

            </div>
        </div>
    </div>
</div>
<div class="row p-0 mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Title</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>No</th>
                    <th>Post</th>
                    <th>Popular Views</th>
                    <th>Created at</th>
                    <th>Created By</th>
                    <th>Option</th>
                    </thead>
                    @foreach ($posts as $item)
                        <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $item->title }}
                        </td>
                        <td>12(dummy)</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>
                            <a href="{{ route('posts.index') }}" class="btn btn-warning btn-sm">See more</a>
                        </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
