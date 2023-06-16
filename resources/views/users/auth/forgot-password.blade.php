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
</head>
<body>
    <section class="wrapper bg-dark text-white">
        <div class="container pt-18 pt-md-20 pb-21 pb-md-21 text-center">

            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col mt-n19">
                    <div class="card shadow-lg">
                        <div class="row gx-0 text-center">
                            <div class="col-lg-6 image-wrapper bg-image bg-cover rounded-top rounded-lg-start d-none d-md-block"
                                data-image-src="{{ asset('./assets/img/photos/tm3.jpg') }}">
                            </div>
                            <!--/column -->
                            <div class="col-lg-6">
                                <div class="p-10 p-md-11 p-lg-13">
                                    <h2 class="mb-3 text-start">Welcome Back</h2>
                                    <p class="lead mb-6 text-start">Fill your email and password to reset password.</p>
                                    <form class="text-start mb-3" method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-floating mb-4">
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                                placeholder="Email" id="email" name="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <span style="color : red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary rounded-pill btn-login w-100 mb-2"
                                            type="submit">Send</button>
                                    </form>
                                    <!-- /form -->
                                    <p class="mb-0">Do you want to log in ? <a {{ route('login.show') }}
                                        class="hover">Sign up</a></p>
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register.show') }}"
                                            class="hover">Sign up</a></p>


                                    <!--/.social -->
                                </div>
                                <!--/div -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.card -->
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
