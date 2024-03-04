<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
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
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" action="/register" method="POST">
                                @csrf

                                <div class="form-group">
                                    @error('fullname')
                                        <p style="color: red; margin: 0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" class="form-control form-control-lg"
                                        id="fullname" placeholder="Fullname" name="fullname" value="{{ old('fullname') }}">
                                </div>

                                <div class="form-group">
                                    @error('username')
                                        <p style="color: red; margin: 0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" class="form-control form-control-lg"
                                        id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                                </div>

                                <div class="form-group">
                                    @error('password')
                                        <p style="color: red; margin: 0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" class="form-control form-control-lg"
                                        id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                </div>

                                <div class="form-group">
                                    @error('email')
                                        <p style="color: red; margin: 0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="email" class="form-control form-control-lg"
                                        id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    @error('address')
                                        <p style="color: red; margin: 0 0 .3rem 0; font-size: 14px;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" class="form-control form-control-lg"
                                        id="address" placeholder="Address" name="address" value="{{ old('address') }}">
                                </div>

                                <div class="mt-3 mb-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="login.html" class="text-primary">Login</a>
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


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    @if (session('message-error'))
        <p style="color: red; margin:0; font-size: 14px;">{{ session('message-error') }}</p>
    @endif

    <form action="/register" method="POST">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="fullname">Fullname</label>
        @error('fullname')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" >

        <label style="margin: 1rem 0 .3rem; display: block" for="username">Username</label>
        @error('username')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="username" id="username" value="{{ old('username') }}" >
        
        <label style="margin: 1rem 0 .3rem; display: block" for="password">Password</label>
        @error('password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="email">Email</label>
        @error('email')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="email" name="email" id="email" value="{{ old('email') }}"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="address">Address</label>
        @error('address')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="address" id="address" value="{{ old('address') }}">

        <button type="submit" style="display: block; margin: 2rem 0">Register</button>

    </form>

    <a href="/register">Login</a>
</body>
</html> --}}
