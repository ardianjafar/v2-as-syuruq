@extends('administrator.layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $t_update }}</h4>
                    <p class="text-muted mb-0">Bismillah Update Category</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', ['category' => $categories]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('administrator.categories._form')
                        <div class="form-group">
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
