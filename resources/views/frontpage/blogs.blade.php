@extends('frontpage.app.app')

@section('title', 'Homepage')

@section('content')
    <div class="row mb-5 pb-3">
        <div class="container-fluid">
            <div class="row mx-auto mt-3">
                @if($posts->count())
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h4 class="card-title text-center mt-3 mb-1">All Posts</h4>
                                <p class="text-muted mb-0 text-center">Dukung kami dengan share setelah membaca postingan kami
                                    are applied to the image so that it scales with the parent element.
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                @if ($posts[0]->thumbnail)
                                    <img src="{{ asset($posts[0]->thumbnail) }}" alt="{{ $posts[0]->name }}">
                                @else
                                    <img src="https://source.unsplash.com/720x500?{{ $posts[0]->name }}" alt="{{ $posts[0]->name }}" class="img-fluid" width="720px" height="500px">
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="justify-content-around text-center ">
                                    <a href="#">
                                        <h1>{{ $posts[0]->title }}</h1>
                                    </a>
                                    <p>By : {{ $posts[0]->author->name }} | ramadhan-1444h | 4 days ago</p>
                                    <div class="">
                                        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti asperiores, ipsam voluptas rem atque libero nostrum tempore ducimus, excepturi, vitae recusandae. Rem consequuntur tempore deleniti esse recusandae harum quaerat tempora suscipit reprehenderit a. Vel quia qui quisquam eaque est distinctio eveniet modi voluptatem. Illo, doloremque qui iste earum impedit similique! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, non repellendus? Aperiam deleniti deserunt earum explicabo fuga ipsa nulla ratione?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row mx-auto">
                            <div class="col">
                                <h4 class="page-title">Blogs</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">As-Syuruqtv</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">All Pages</a></li>

                                </ol>
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                    <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                    <span class="" id="Select_date">{{ date('d/m/y H:i') }}</span>
                                    <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- end page title end breadcrumb -->
            <div class="row">
                @foreach($posts->skip(1) as $post)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-card">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/', $post->thumbnail) }}" alt="{{ $post->slug }}" class="img-fluid rounded"/>
                                    @else
                                        <img src="https://source.unsplash.com/500x500?{{ $post->slug }}" alt="{{ $post->slug }}" class="img-fluid rounded"/>
                                    @endif
                                    <span class="badge badge-purple px-3 py-2 bg-soft-primary font-weight-semibold mt-3">ramadhan-1444h</span>
                                    <h4 class="my-3">
                                        <a href="#" class="">{{ $post->title }}</a>
                                    </h4>
                                    <p class="text-muted">{{ $post->description }}</p>
                                    <hr class="hr-dashed">
                                    <div class="d-flex justify-content-between">
                                        <div class="meta-box">
                                            <div class="media">
                                                <img src="{{ asset('dastone/assets/images/users/user-5.jpg') }}" alt="" class="thumb-sm rounded-circle mr-2">
                                                <div class="media-body align-self-center text-truncate">
                                                    <h6 class="m-0 text-dark">As-SyuruqTeam</h6>
                                                    <ul class="p-0 list-inline mb-0">
                                                        <li class="list-inline-item">{{ $post->created_at->diffForHumans() }}</li>
                                                        <li class="list-inline-item">by <a href="">{{ $post->author->name }}</a></li>
                                                    </ul>
                                                </div><!--end media-body-->
                                            </div>
                                        </div><!--end meta-box-->
                                        <div class="align-self-center">
                                            <a href="{{ route('detailBlogs', $post->slug) }}" class="text-dark">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                </div><!--end blog-card-->

                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->
                @endforeach
                @else
                    <p class="text-center fs-4">No Posts Found</p>
                @endif
                <div class="d-flex justify-content-center mt-5 mb-5">
                    {{ $posts->links() }}
                </div>
            </div><!--end row-->
        </div>
    </div>
@endsection
