<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Qoruz home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" sizes="180x180"
        href="https://terareach.s3-ap-southeast-1.amazonaws.com/white-labeled-brands/qoruz_circle.png">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel=" stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel=" stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel=" stylesheet">
    <link href="{{ asset('assets/css/home.css') }}" rel=" stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>


<!-- ===== Header section ======!-->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="assets/img/qoruz.png" alt="">
            <span class="d-none d-lg-block">PostAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center mt-3" action="{{ route('search') }}" method="get">
            @csrf
            <input type="text" name="search" id="search" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">{{ count($posts) }}</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="{{ route('create') }}" data-toggle="tooltip" data-placement="top"
                    title="create post">
                    <i class="bi bi-chat-left-text"></i>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->lname }}.
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->job }}</span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center pe-0" href="">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<!--=======Sidebar=======-->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('showprofile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('reg') }}">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('log') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar-->


<!-- =====Main Section =======-->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            </ol>
        </nav>

        <div class="container" id="showpost">
            <div class="showpost">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 mt-4">
                            <div class="card post-section">
                                <div class="post-image">
                                    <a href="{{ route('viewpost', $post->id) }}">
                                        <img src="{{ asset('images/' . $post->image) }}" class="card-img-top img"
                                            width="120px" height="200px">
                                    </a>
                                    <a href="{{ route('Delete', $post->id) }}">
                                        <img src="{{ asset('images/svg/close.svg') }}" class="close-icon">
                                    </a>
                                </div>

                                <div class="post-details">
                                    <span class="badge bg-primary badge-number">{{ $post->category }}</span>
                                    <small class="text-muted">{!! date('M d Y', strtotime($post->created_at)) !!}</small>
                                </div>

                                <hr class="post-line">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row" id="showpost">
        </div>
    </div>
</main>

<!-- End #main -->

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="assets/js/main.js"></script>
