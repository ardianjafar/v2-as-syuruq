@extends('administrator.layouts.app')

@section('title', 'Halaman Post')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="p-1 mb-2">
                <a class=" btn btn-sm btn-soft-primary" href="{{ route('users.create') }}" role="button"><i class="fas fa-plus mr-2"></i>New Users</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    @forelse($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </tbody>
                    @empty
                        Kosong
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
