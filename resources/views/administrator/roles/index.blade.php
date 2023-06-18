@extends('administrator.layouts.app')

@section('title', 'Halaman Post')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="p-1 mb-2">
                <a class=" btn btn-sm btn-soft-primary" href="{{ route('roles.create') }}" role="button"><i class="fas fa-plus mr-2"></i>New Roles</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Test</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
{{--                                @can('role_detail')--}}
                                    <a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-primary">See More</a>
{{--                                @endcan--}}
                                <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-warning">Edit</a>
{{--                                @can('role_delete')--}}
                                    <form class="d-inline" action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
{{--                                @endcan--}}

                            </td>
                        </tr>
                    @empty
                        <p>Kosong</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('javas')


@endpush
