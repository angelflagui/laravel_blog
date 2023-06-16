@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create a New Post</a>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>
                                        <img src="{{ asset($post->image) }}" alt="{{ asset($post->image) }}"
                                            class="w-12 h-12" style="width: 50px; height : 50px">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}"
                                            class="btn btn-primary">edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Delete
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="{{ route('admin.posts.delete', ['post' => $post]) }}"
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

                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
