@extends('administrator.layouts.app')

@section('title', 'Halaman Create User')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Bla Bla Bla</h4>
                    <p class="text-muted mb-0">Bismillah create users</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store')}}" method="POST">
                        @csrf
                        @include('administrator.users._form')
                        <div class="form-group">
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
