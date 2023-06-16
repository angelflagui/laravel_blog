@extends('layouts.blog.master')
@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 bg-content text-white" data-image-src="./assets/img/photos/bg4.jpg">
    <div class="container pt-18 pb-16" style="z-index: 5; position:relative">
      <div class="row gx-0 gy-12 align-items-center">
        <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 content text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
          <h1 class="display-2 mb-5 text-white">Blog Testing.</h1>
          <p class="lead fs-lg lh-sm mb-7 pe-xl-10">Just a testing description.</p>
          <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
            <span><a href="#" class="btn btn-lg btn-white rounded-pill me-2">Example Button</a></span>
            <span><a href="#" class="btn btn-lg btn-outline-white rounded-pill">Example Button</a></span>
          </div>
        </div>
        <!--/column -->
        <div class="col-lg-5 offset-lg-1">
          <div class="swiper-container dots-over shadow-lg" data-margin="5" data-nav="true" data-dots="true">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="./assets/img/photos/about21.jpg" srcset="./assets/img/photos/about21@2x.jpg 2x" class="rounded" alt="" /></div>
                <div class="swiper-slide"><img src="./assets/img/photos/about23.jpg" srcset="./assets/img/photos/about23@2x.jpg 2x" class="rounded" alt="" /></div>
              </div>
              <!--/.swiper-wrapper -->
            </div>
            <!--/.swiper -->
          </div>
          <!-- /.swiper-container -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
@endsection
