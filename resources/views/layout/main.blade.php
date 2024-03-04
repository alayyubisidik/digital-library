<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Dashboard - @yield('title')</title>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row pr-5">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('/images/logo.svg') }}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img
                        src="{{ asset('/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-xl-block">
                    @if (Auth::user()->role == 'admin')
                        <form class="d-flex align-items-center h-100" action="/dashboard-admin/book">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input type="text" value="{{ request('search') }}" name="search" class="form-control bg-transparent border-0"
                                    placeholder="Search book by title">
                            </div>
                        </form>
                    @endif
                    @if (Auth::user()->role == 'member')
                        <form class="d-flex align-items-center h-100" action="/dashboard-member/book">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input type="text" value="{{ request('search') }}" name="search" class="form-control bg-transparent border-0"
                                    placeholder="Search book by title">
                            </div>
                        </form>
                    @endif
                    @if (Auth::user()->role == 'officer')
                        <form class="d-flex align-items-center h-100" action="/dashboard-officer/book">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input type="text" value="{{ request('search') }}" name="search" class="form-control bg-transparent border-0"
                                    placeholder="Search book by title">
                            </div>
                        </form>
                    @endif
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('pp-default.jpeg') }}" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->username }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('/images/faces/face28.png') }}" alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Inbox</span>
                                    <span class="p-0">
                                        <span class="badge badge-primary">3</span>
                                        <i class="mdi mdi-email-open-outline ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Profile</span>
                                    <span class="p-0">
                                        <span class="badge badge-success">1</span>
                                        <i class="mdi mdi-account-outline ml-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Settings</span>
                                    <i class="mdi mdi-settings"></i>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Lock Account</span>
                                    <i class="mdi mdi-lock ml-1"></i>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="/logout">
                                    <span>Log Out</span>
                                    <i class="mdi mdi-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @if (Auth::user()->role == 'admin')
                    <ul class="nav pt-4">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin">
                                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-admin') ? "#44ce42" : "#ccc" }};">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin/user">
                                <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-admin/user*') ? "#44ce42" : "#ccc" }};">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin/book">
                                <span class="icon-bg"><i class="mdi mdi-book-open-variant menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-admin/book*') ? "#44ce42" : "#ccc" }};">Book</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin/category">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-admin/category*') ? "#44ce42" : "#ccc" }};">Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin/borrowing">
                                <span class="icon-bg"><i class="mdi mdi-repeat menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-admin/borrowing*') ? "#44ce42" : "#ccc" }};">Borrowing</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-admin/generate-report">
                                <span class="icon-bg"><i class="mdi mdi-cloud-print menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-admin/generate-report*') ? "#44ce42" : "#ccc" }};">Generate Report</span>
                            </a>
                        </li>
                        <li class="nav-item sidebar-user-actions">
                            <div class="sidebar-user-menu">
                                <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                                    <span class="menu-title">Log Out</span></a>
                            </div>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'officer')
                    <ul class="nav pt-4">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-officer">
                                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-officer') ? "#44ce42" : "#ccc" }};">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-officer/book">
                                <span class="icon-bg"><i class="mdi mdi-book-open-variant menu-icon"></i></span>
                                <span class="menu-title"  style="color: {{ request()->is('dashboard-officer/book*') ? "#44ce42" : "#ccc" }};">Book</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-officer/category">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-officer/category*') ? "#44ce42" : "#ccc" }};">Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-officer/borrowing">
                                <span class="icon-bg"><i class="mdi mdi-repeat menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-officer/borrowing*') ? "#44ce42" : "#ccc" }};">Borrowing</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-officer/generate-report">
                                <span class="icon-bg"><i class="mdi mdi-cloud-print menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-officer/generate-report*') ? "#44ce42" : "#ccc" }};">Generate Report</span>
                            </a>
                        </li>
                        <li class="nav-item sidebar-user-actions">
                            <div class="sidebar-user-menu">
                                <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                                    <span class="menu-title">Log Out</span></a>
                            </div>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'member')
                    <ul class="nav pt-4">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-member">
                                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-member') ? "#44ce42" : "#ccc" }};">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-member/book">
                                <span class="icon-bg"><i class="mdi mdi-book-open-variant menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-member/book*') ? "#44ce42" : "#ccc" }};">Book</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-member/private-collection">
                                <span class="icon-bg"><i class="mdi mdi-bookmark-outline menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-member/private-collection') ? "#44ce42" : "#ccc" }};">Private Collection</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-member/borrowing">
                                <span class="icon-bg"><i class="mdi mdi-repeat menu-icon"></i></span>
                                <span class="menu-title" style="color: {{ request()->is('dashboard-member/borrowing*') ? "#44ce42" : "#ccc" }};">Borrowing</span>
                            </a>
                        </li>
                        <li class="nav-item sidebar-user-actions">
                            <div class="sidebar-user-menu">
                                <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                                    <span class="menu-title">Log Out</span></a>
                            </div>
                        </li>
                    </ul>
                @endif
            </nav>

            <div class="main-panel" >
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a> from Bootstrapdash.com</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>

    </div>

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
