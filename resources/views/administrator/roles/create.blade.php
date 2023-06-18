@extends('administrator.layouts.app')

@section('title', 'Create Roles')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title">{{ $t_create }}</h4>
                        <p class="text-muted mb-0">Bismillah create roles</p>
                </div>
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                            @include('administrator.roles._form')
                            <div class="form-group">
                                <a href="{{ route('tags.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
