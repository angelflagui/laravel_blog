@extends('layouts.blog.master')
@section('content')
    <div class="content-wrapper">

        <section class="wrapper bg-soft-primary">
            <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
                <div class="row">
                    <div class="col-md-10 col-xl-8 mx-auto">
                        <div class="post-header">

                            <!-- /.post-category -->
                            <h1 class="display-1 mb-4">{{ $post->title }}</h1>
                            <ul class="post-meta mb-5">
                                <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $post->updated_at }}</span>
                                </li>
                                <li class="post-author"><a href="#"><i
                                            class="uil uil-user"></i><span>{{ $post->user->name }}</span></a></li>
                                <li class="post-comments"><a href="#"><i
                                            class="uil uil-comment"></i>{{ $comments->count() }}<span>
                                            Comments</span></a></li>

                            </ul>
                            <!-- /.post-meta -->
                        </div>
                        <!-- /.post-header -->
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
                        <div class="blog single mt-n17">
                            <div class="card">
                                <figure class="card-img-top"><img src="{{ $post->image }}" alt="{{ $post->image }}" />
                                </figure>
                                <div class="card-body">
                                    <div class="classic-view">
                                        <article class="post">
                                            <div class="post-content mb-5">

                                                <p>{{ $post->content }}</p>

                                                <div class="row g-6 mt-3 mb-10">

                                                    <!--/column -->
                                                </div>
                                                <!-- /.row -->
                                                <blockquote class="fs-lg my-8">
                                                    <footer class="blockquote-footer">Created at {{ $post->created_at }}
                                                    </footer>
                                                </blockquote>
                                            </div>
                                            <!-- /.post-content -->

                                            <!-- /.post-footer -->
                                        </article>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.classic-view -->
                                    <hr />
                                    <div class="author-info d-md-flex align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                        </div>

                                    </div>
                                    <div id="comments">
                                        <h3 class="mb-6">{{ $comments->count() }} Comments</h3>
                                        @foreach ($comments as $comment)
                                            <ol id="singlecomments" class="commentlist">
                                                <li class="comment">
                                                    <div class="comment-header d-md-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <figure class="user-avatar"><img class="rounded-circle"
                                                                    alt="photo"
                                                                    src="{{ asset('img/avatars/u1.jpg') }}" />
                                                            </figure>
                                                            <div>
                                                                <h6 class="comment-author">{{ $comment->user->name }}</h6>
                                                                <ul class="post-meta">
                                                                    <li><i
                                                                            class="uil uil-calendar-alt"></i>{{ $comment->created_at }}
                                                                    </li>
                                                                </ul>
                                                                <!-- /.post-meta -->
                                                            </div>
                                                            <!-- /div -->
                                                        </div>
                                                        @if (Auth::user()->id == $comment->user_id)
                                                        <div class="mt-3 mt-md-0 ms-auto">
                                                            <a class="btn btn-primary mb-0" href="" >edit</a>
                                                            <button type="button" class="btn btn-danger mb-0" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}">delete</button>
                                                        </div>

                                            <div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <form action="{{ route('comments.delete', ['comment' => $comment]) }}"
                                                    method="post">
                                                    @csrf

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Title
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this post?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                              </div>
                                                    @endif
                                                        <!-- /div -->
                                                    </div>
                                                    <!-- /.comment-header -->
                                                    <p>{{ $comment->content }}</p>
                                                </li>

                                            </ol>

                                        @endforeach
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            @guest
                                <h3 class="mb-6">You must be <a href="{{ route('login.show') }}">logged in</a> to comment
                                </h3>
                            @else
                                <h3 class="mb-6">Write a comment</h3>
                                <form class="comment-form" method="Post"
                                    action="{{ route('comments.store', ['id' => $post->id]) }}">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Comment"
                                            style="height: 150px"></textarea>
                                        @error('content')
                                            <span style="color : red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill mb-0">Comment</button>
                                </form>
                            @endguest
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /column -->
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- /section -->
    </div>
    <!-- /.content-wrapper -->

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


@endsection
