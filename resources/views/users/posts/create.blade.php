
@extends('layouts.blog.master')
@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-12 pt-md-14 pb-md-16 text-center">
      <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
          <h1 class="display-1 mb-3">Posts</h1>
          <p class="lead px-xxl-10">here you can create your own post</p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <div class="container">
    <h1>Posts</h1>
    <form action="{{ route('users.posts.store') }}" method="post" enctype="multipart/form-data" class="card-header py-6">
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
            <span class="sr-only">Choose File </span><br><br>

            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full
                file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
        </label>
        @error('image')
            <span style="color : red;">{{ $message }}</span>
        @enderror
        <br>
        <br>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
@endsection
