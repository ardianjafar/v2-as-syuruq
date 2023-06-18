@extends('administrator.layouts.app')

@section('title', 'Create Tag')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $t_create }}</h4>
                    <p class="text-muted mb-0">Bismillah create tag</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('tags.store')}}" method="POST">
                        @csrf
                        @include('administrator.tags._form')
                        <div class="form-group">
                            <a href="{{ route('tags.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
