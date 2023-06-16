@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MY BLOG') }}</div>
                <div class="container">
                    <h1>Posts</h1>
                    <form action="{{ route('admin.posts.update', ['posts'=>$post]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                            @error('title')
                            <span style="color : red;">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input name="content" id="content" cols="30" rows="10" class="form-control" value="{{ $post->content }}">
                            @error('content')
                            <span style="color : red;">{{ $message }}</span>
                        @enderror
                            <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose File: </span>
                            <input type="file" name="image" value="{{ $post->image }}"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </label>
                        @error('image')
                        <span style="color : red;">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
