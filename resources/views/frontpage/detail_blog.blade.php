@extends('frontpage.app.app')

@section('title', 'Detail Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto mb-5 pb-5">
                <div class="mt-5 pt-2">
                    <h1 class="mb-3 mt-5">{{ $posts->title }}</h1>
                    <div class="d-flex justify-content-between">
                        <p>By . {{ $posts->author->name }} | {{ $posts->created_at->diffForHumans() }}</p>
                        <article class="mb-2">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">{{ date("d/m/y H:i") }}</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                            </a>
                        </article>
                    </div>
                </div>
                <div class="mb-4">
                    <img src="https://source.unsplash.com/1200x400?mekkah" alt="" class="img-fluid">
                    <!-- <img src="dastone-v1.0/assets/images/mekkah.jpg" alt="" class="img-fluid"> -->
                </div>
                Category Post : ramadhan-1444h
                <hr>
                <article class="my-3 fs-5">
                    {!! $posts->content !!}
                </article>
                Related Post
                <div class="row">
                    @foreach($relatedPosts as $related)
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top img-fluid bg-light-alt" src="{{ asset('dastone/assets/images/small/img-2.jpg')}}" alt="Card image cap">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Card title</h4>
                                        </div><!--end col-->
                                        <div class="col-auto">
                                            <img class="rounded-circle" src="{{ asset('dastone/assets/images/users/user-7.jpg')}}" alt="" height="24">
                                            <span class="badge badge-outline-light">30 May 2020</span>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <p class="card-text text-muted ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{{ route('detailBlogs', $related->slug) }}" class="btn btn-primary btn-sm">Go somewhere</a>
                                </div><!--end card -body-->
                            </div><!--end card-->
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="card">
                    <div class="card-header mb-0 p-0">
                        <h3 class="mx-2">Share</h3>
                    </div>
                </div>
                <a href="whatsapp://send?text=as-syuruqtv.com/{{ $posts->slug }}" class="btn btn-outline-success">WhatsApp</a>
                <a href="" class="btn btn-outline-primary">Telegram</a>
            </div>
        </div>
    </div>
@endsection
