@extends('layouts.blog.master')
@section('content')
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-12 pt-md-14 pb-md-16 text-center">
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                    <h1 class="display-1 mb-3">Posts</h1>
                    <p class="lead px-xxl-10">Here You can manage your posts </p>
                </div>

            </div>

        </div>

    </section>
    <div class="container">
        <div class="py-6">
            <a href="{{ route('users.posts.create') }}" class="btn btn-primary">create new post</a>
        </div>
        <div class="card shadow mb-8">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        <th>Comments <br>number</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>   <img src="{{ asset($post->image) }}" alt="{{ asset($post->image) }}" class="w-12 h-12"
                                    style="width: 50px; height : 50px"></td>

                                    <td>
                                        <a href="{{ route('users.posts.edit', ['post' => $post]) }}" class="btn btn-primary">edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                                            delete
                                        </button>
                                        <a class="btn btn-secondary" href="{{ route('front.posts.show', $post->id) }}">show</a>
                                        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="{{ route('users.posts.delete', ['post' => $post]) }}" method="post">
                                                @csrf
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">delete title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this post?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                     {{ $post->comments->count() }}
                                    </td>
                            </tr>
                    </tbody>
                @endforeach
            </table>


        </div>
    </div>
@endsection
