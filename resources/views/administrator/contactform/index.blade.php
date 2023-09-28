@extends('administrator.layouts.app')

@section('title', 'Halaman List Contact Form')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactForm as $contact)
                        <tr>
                            <td>
                                {{ $contact->name }}
                            </td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Test{{$contact->id}}">
                                    <i data-feather="eye"></i>
                                </button>
                                <form class="d-inline" action="{{ route('ctform.destroy', ['id' => $contact->id]) }}" role="alert" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="show_confirm">
                                        <i data-feather="trash" class="text-danger font-18"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="Test{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Messages</h6>
                                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-times"></i></span>
                                        </button>
                                    </div><!--end modal-header-->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h5>From : {{ $contact->name }}</h5>
                                                <h5>Email : {{ $contact->email }}</h5>
                                                <span class="badge bg-soft-secondary">Created : {{ $contact->created_at->diffForHumans()}}</span>
                                                    <li>{{ $contact->message }}</li>
                                                </ul>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    </div><!--end modal-footer-->
                                </div><!--end modal-content-->
                            </div><!--end modal-dialog-->
                        </div>
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
