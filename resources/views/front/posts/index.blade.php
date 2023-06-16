@extends('layouts.blog.master')
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
                    <h1 class="display-1 mb-3">Blog</h1>
                    <p class="lead px-lg-5 px-xxl-8">Welcome. Here you can find the latest articles.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog classic-view mt-n17">
                        @foreach ($posts as $post)
                            <article class="post">
                                <div class="card">
                                    <figure class="card-img-top overlay overlay-1 hover-scale"><a class="link-dark"
                                            href="{{ route('front.posts.show', $post->id) }}">
                                            <img src="{{ $post->image }}" alt="{{ $post->image }}" /></a>

                                    </figure>
                                    <div class="card-body">
                                        <div class="post-header">

                                            <!-- /.post-category -->
                                            <h2 class="post-title mt-1 mb-0"><a class="link-dark"
                                                    href="{{ route('front.posts.show', $post->id) }}">
                                                    Title : {{ $post->title }} <br>
                                                    Author : {{ $post->user->name  }}
                                                </a></h2>
                                        </div>
                                        <!-- /.post-header -->
                                        <div class="post-content">
                                            <p>{{ $post->content }}</p>
                                        </div>
                                        <!-- /.post-content -->
                                    </div>
                                    <!--/.card-body -->
                                    <div class="card-footer">
                                        <ul class="post-meta d-flex mb-0">
                                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $post->updated_at }}</span>
                                            </li>
                                            {{-- <li class="post-author"><a href="#"><i class="uil uil-user"></i><span>By {{ $user->name }}</span></a></li> --}}
                                            <li class="post-comments"><i
                                                        class="uil uil-comment"></i>{{ $post->comments->count() }}<span> Comments</span></li>
                                            <li class="post-likes ms-auto"><a href="#"><i
                                                        class="uil uil-heart-alt"></i>3</a></li>
                                        </ul>
                                        <!-- /.post-meta -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </article>
                        @endforeach

                    </div>


                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /section -->

@endsection
