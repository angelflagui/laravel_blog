@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <h1>posts</h1>
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" id="title" class="form-control">
                @error('title')
                    <span style="color : red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <input name="content" id="content" cols="30" rows="10" class="form-control">
                @error('content')
                    <span style="color : red;">{{ $message }}</span>
                @enderror
            </div>
            <label class="block" for="image">
                <span class="sr-only">Choose File </span>
                <input type="file" name="image" id="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full
                    file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </label>
            @error('image')
                <span style="color : red;">{{ $message }}</span>
            @enderror
            
            <br>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
@endsection
