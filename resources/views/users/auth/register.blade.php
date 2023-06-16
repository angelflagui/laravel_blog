<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Blog</title>
  <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('./assets/img/favicon.png') }}">



<!-- Custom styles for this template-->


</head>
<body>
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-600 text-white" data-image-src="{{ asset('assets/img/photos/bg18.png') }}">
    <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="display-1 mb-3">Sign Up</h1>
          <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
            </ol>
          </nav>
          <!-- /nav -->
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
        <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
          <div class="card">
            <div class="card-body p-11 text-center">
              <h2 class="mb-3 text-start">Sign up </h2>
              <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
              <form class="text-start mb-3" method="post" action="{{ route('register.perform') }}" >
                @csrf
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                  <label for="loginName">Name</label>
                    @error('name')
                <span style="color : red;">{{ $message }}</span>
                 @enderror
                </div>

                <div class="form-floating mb-4">
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                  <label for="loginEmail">Email</label>
                  @error('email')
                  <span style="color : red;">{{ $message }}</span>
                   @enderror
                </div>
                <div class="form-floating password-field mb-4">
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                  <span class="password-toggle"><i class="uil uil-eye"></i></span>
                  <label for="loginPassword">Password</label>
                  @error('password')
                  <span style="color : red;">{{ $message }}</span>
                   @enderror
                </div>
                <div class="form-floating password-field mb-4">
                  <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                  <span class="password-toggle"><i class="uil uil-eye"></i></span>
                  <label for="loginPasswordConfirm">Confirm Password</label>
                  @error('password_confirmation')
                  <span style="color : red;">{{ $message }}</span>
                   @enderror
                </div>
                <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign Up</button>
              </form>
              <!-- /form -->
              <p class="mb-0">Already have an account? <a href="{{ route('login.show') }}" class="hover">Sign in</a></p>

              <!--/.social -->
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>

  <script src="{{ asset('./assets/js/plugins.js') }}"></script>
  <script src="{{ asset('./assets/js/theme.js') }}"></script>
</body>
