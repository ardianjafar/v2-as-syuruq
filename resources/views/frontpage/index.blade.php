@extends('frontpage.app.app')

@section('title', 'Homepage')

@section('content')
    <div class="">
        <!-- Start Jumbotron -->
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    @if(Session::has('success'))
                    <div class="alert alert-success border-0 mt-5" role="alert">
                        {{ session('success') }}
                    </div>
                   @endif
                    <div class="row mt-5">
                        <div class="col-lg-6 text-center">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner p-1">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('dastone/assets/images/frontpage/1.jpg') }}" class="d-block w-100"
                                             alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('dastone/assets/images/frontpage/6.jpg') }}"
                                             class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-5 offset-lg-1 align-self-center">
                            <div class="p-1">
                                <h1 class="my-4 font-weight-bold">OUR OFFICIAL PAGE <span class="text-primary"><br> AS-SYURUQ MEDIA.</span>
                                </h1>
                                <p class="font-14 text-muted">
                                    Media Islami Ahlussunnah Waljamaah, Dengan menyediakan konten Islami untuk ummat,
                                    dengan ilmu agama yang bersambung sanadnya.
                                </p>
                                <a href="#about" class="btn btn-outline-primary">Tentang Kami</a>
                            </div>
                        </div><!--end col-->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Jumbotron -->

        <!-- Start About -->
        <div class="bg-light mt-5">
            <div class="container-fluid mb-5">
                <div class="row mt-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="p-5" id="about">
                            <h1 class="text-center font-weight-bold">ABOUT | <span class="text-primary">AS-SYURUQ</span>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <img src="{{ asset('dastone/assets/images/frontpage/1.jpg') }}" alt="ini gambar"
                                     class="w-100 d-block">
                            </div>
                            <div class="col-md-6 mt-1 p-2">
                                <p class="lead"><span class="font-16">As Syuruq Media</span> digagas oleh <span
                                            class="font-weight-bold">Gus Muhammad Ibrahim Arofi Himzi, BSc., M.H</span>
                                    pada tahun 2019. Pada awal berdiri beliau menamainya Ngaos Nade kemudian setelah
                                    beliau melakukan istiqoroh dan digantikan dengan nama As Syuruq yang dibangun dan
                                    dikembangkan secara formal pada 08 Desember 2019 (11 Rabiul Akhir 1441H).</p>
                                <p class="lead">Latar belakang berdirinya As Syuruq Media karena ingin menyebarkan
                                    kajian Gus Muhammad Ibrahim Arofi Himzi, BSc., M.H,.Namun lambat laun semakin
                                    berkembang dengan menyebarkan kajian kontemporer islam masa kini, sekaligus sebagai
                                    wadah untuk para pemuda dalam belajar berdakwah melalui media sosial.</p>
                                <p class="lead">Maksud dari di berinya nama As Syuruq ini mempunyai arti Syuruq
                                    merupakan terbitnya matahari. Diharapkan dengan diberinya nama As Syuruq ini
                                    merupakan satu harapan dari diri kita yaitu memunculkan para pemuda pemudi yang
                                    dapat menyinari media dakwah dengan ide ide kreatif dan ajaran Islam Ahlussunnah Wal
                                    Jamaah an-Nahdliyyah..</p>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
        <!-- End About -->

        <!-- Start Sosial Media -->
        <div class="row mt-5 mb-5" id="contact-us">
            <div class="col-10 mx-auto">
                <div class="">
                    <h1 class="">Kunjungi sosial media kami</h1>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Youtube</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="ribbon1 rib1-danger">
                                    <span class="text-white text-center rib1-danger">Yt</span>
                                </div>
                                <p class="card-text">Menyajikan kontent dakwah yang di kemas dari kajian umum yang di
                                    selenggarakan offline ataupun online, kunjungi kami dan bantu dukung dengan subscribe.</p>
                                <a class="btn btn-outline-danger popup-youtube"
                                   href="https://www.youtube.com/@assyuruqtv">Open YouTube</a>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tiktok</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="ribbon1 rib1-dark">
                                    <span class="text-white text-center rib1-dark">Tk</span>
                                </div>
                                <p class="card-text">Menyajikan konten seputar rekaman dakwah yang berlangsung ataupun kajian dakwah dengan pembahasan kitab-kitab salafi.</p>
                                <a class="btn btn-outline-dark popup-youtube"
                                   href="https://www.tiktok.com/@assyuruqtv">Open YouTube</a>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Spotify</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="ribbon1 rib1-success">
                                    <span class="text-white text-center rib1-success">Os</span>
                                </div>
                                <p class="card-text">Menyajikan record seputar dakwah kajian baik offline ataupun online dan juga lantunan sholawat nabi.</p>
                                <a class="btn btn-outline-success popup-youtube"
                                   href="https://open.spotify.com/show/0jt3O7QdizgrXAXpSVqPO4">Open Spotify</a>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Telegram</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary">
                                    <span class="text-white text-center rib1-primary">Tm</span>
                                </div>
                                <p class="card-text">Ikuti akun Official Telegram kami terkait dengan kajian dakwah yang terbaru dan pembahasan seputar kitab-kitab salafi.</p>
                                <a class="btn btn-outline-primary popup-youtube"
                                   href="https://t.me/assyuruqtv">Open Telegram</a>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- End Sosial Media -->

        <!-- Blogs Start -->
        <div class="container-fluid p-3" id="artikel">
            <h1 class="font-weight-bold">ARTIKEL<span class="text-primary"> | AS-SYURUQ</span></h1>
            <p class="blockquote-footer font-14">Kunjungi artikel-artikel terbaru kami untuk mendapatkan update terbaru seputar dakwah ataupun kajian dari para asatid/guru kami.</p>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-card">
                                    @if($post->thumbnail)
                                        <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->slug  }}" class="img-fluid rounded"/>
                                    @else
                                        <img src="https://source.unsplash.com/1200x400?{{ $post->slug }}" alt="{{ $post->slug  }}" class="img-fluid rounded"/>
                                    @endif
                                    <span class="badge badge-purple px-3 py-2 bg-soft-primary font-weight-semibold mt-3">Categories</span>
                                    <h4 class="my-3">
                                        <a href="" class="">{{ $post->title }}</a>
                                    </h4>
                                    <p class="text-muted">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Cum sociis natoque penatibus et magnis.</p>
                                    <hr class="hr-dashed">
                                    <div class="d-flex justify-content-between">
                                        <div class="meta-box">
                                            <div class="media">
                                                <div class="avatar-box thumb-sm align-self-center mr-2">
                                                    <span class="avatar-title bg-purple rounded-circle"><i class="fas fa-user"></i></span>
                                                </div>
                                                <div class="media-body align-self-center text-truncate">
                                                    <h6 class="m-0 text-dark">{{ $post->author->name }}</h6>
                                                    <ul class="p-0 list-inline mb-0">
                                                        <li class="list-inline-item">{{ $post->created_at->diffForHumans() }}</li>
                                                    </ul>
                                                </div><!--end media-body-->
                                            </div>
                                        </div><!--end meta-box-->
                                        <div class="align-self-center">
                                            <a href="{{ route('detailBlogs', $post->slug)  }}" class="text-dark">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                </div><!--end blog-card-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->
                @endforeach
            </div>
        </div>
        <div class="text-center mt-3 mb-3">
            <a href="{{ url('blogs') }}" class="text-blue">
                Read More Artikel
            </a>
        </div>
        <!-- EndBlogs -->

        <!-- Start Gallery -->
        <div class="bg-light p-1" id="gallery">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12 p-2">
                        <h1 class="font-weight-bold">GALLERY | <span class="text-primary"> AS-SYURUQ</span></h1>
                        <P class="text-muted">- Pengambilan gambar dilakukan pada saat kajian berlangsung , <br> Hubungi kami untuk info lebih lanjut terkait dengan kajian atau<br>
                             izin gambar untuk di publish ke media digital yang lain</P>
                        <div class="row p-2">
                            <div class="col-md-4 mt-2 mb-3">
                                <img src="{{ asset('dastone/assets/images/frontpage/6.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('dastone/assets/images/frontpage/4.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="col-md-4 mt-2">
                                <img src="{{ asset('dastone/assets/images/frontpage/7.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="col-md-4 mt-3">
                                <img src="{{ asset('dastone/assets/images/frontpage/8.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="col-md-4 mt-5">
                                <img src="{{ asset('dastone/assets/images/frontpage/10.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="col-md-4 mt-3">
                                <img src="{{ asset('dastone/assets/images/frontpage/9.jpg') }}" class="d-block w-100"
                                     alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Gallery -->

        <!-- Start Input Form -->
        <div class="container-fluid p-3  mb-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contact Us</h4>
                            <p class="text-muted mb-0">
                                Isi dan berikan ulasan tentang website kami atau kontak info lebih lanjut!</p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('contactForm') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-6  mo-b-15 mb-2">
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="email" name="email" id="example-email-input3"
                                                       placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" name="phone" type="text" id="subject2"
                                                       placeholder="Phone">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"
                                                      placeholder="Your message"></textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block px-4">Send Email</button>
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div>
        </div>
        <!-- End Form -->

        <!-- Maps start-->

        <!-- End Maps -->
    </div>

@endsection


