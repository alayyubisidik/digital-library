<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap');
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        @if (session('message-error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('message-error') }}
                            </div>
                        @endif
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <h1 style="font-weight: bold; color: #393E46; font-family: 'Roboto', sans-serif;">Digital <span style="color: #00ADB5">Library</span></h1>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    @error('username')
                                        <p style="color: red; margin:0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        placeholder="Username" name="username" value="{{ old('username') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3 mb-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                        href="/register" class="text-primary">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <!-- endinject -->
</body>

</html>


