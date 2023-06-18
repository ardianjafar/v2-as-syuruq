@extends('administrator.layouts.app')

@section('title', 'Halaman List Contact Form')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                <img src="assets/images/products/img-1.png" alt="" height="40">
                                <p class="d-inline-block align-middle mb-0">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $tag->title }}</a>
                                    <br>
                                    <span class="text-muted font-13">{{ $tag->created_at->diffForHumans() }}</span>
                                </p>
                            </td>
                            <td>{{ $tag->slug }}</td>
                            <td>
                                <a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                                <form class="d-inline" action="{{ route('tags.destroy', ['tag' => $tag]) }}" role="alert" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="show_confirm">
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
