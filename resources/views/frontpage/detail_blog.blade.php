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
                    {!! $posts->description !!}
                </article>

                <hr>
                <div class="card">
                    <div class="card-header mb-0 p-0">
                        <h3 class="mx-2">Share</h3>
                    </div>
                </div>
                <a href="" class="btn btn-outline-success">WhatsApp</a>
                <a href="" class="btn btn-outline-primary">Telegram</a>
            </div>
        </div>
    </div>
@endsection
