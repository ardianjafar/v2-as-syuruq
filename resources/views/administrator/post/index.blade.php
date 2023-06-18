@extends('administrator.layouts.app')

@section('title', 'Halaman Posts')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="p-1 mb-2">
                <a class=" btn btn-sm btn-soft-primary" href="{{ route('posts.create') }}" role="button"><i class="fas fa-plus mr-2"></i>New Post</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Pics</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Avai.Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="assets/images/products/img-1.png" alt="" height="40">
                                <p class="d-inline-block align-middle mb-0">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $post->title }}}</a>
                                    <br>
                                    <span class="text-muted font-13">{{ $post->created_at->diffForHumans() }}</span>
                                </p>
                            </td>
                            <td>Sports</td>
                            <td>32</td>
                            <td>$39</td>
                            <td><span class="badge badge-soft-warning">Stock</span></td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-pink"></i></li>
                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                    <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                                <form class="d-inline show_confirm" action="{{ route('posts.destroy', ['post' => $post]) }}" role="alert" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="las la-trash-alt text-danger font-18"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    {{--    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("title");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endpush
