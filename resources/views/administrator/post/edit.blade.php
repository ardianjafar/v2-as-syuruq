@extends('administrator.layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bismillah</h4>
                    <p class="text-muted mb-0">Semoga postingan yang di buat berkah untuk ummat</p>
                </div><!--end card-header-->
                <div class="card-body">
                    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            @include('administrator.post._form')
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div>
        </div>
    </div>
@endsection
