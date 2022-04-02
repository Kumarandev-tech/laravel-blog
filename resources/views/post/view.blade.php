<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>view post</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/view.css') }}" rel=" stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel=" stylesheet">

</head>

<!--========= Header section =======-->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="assets/img/qoruz.png" alt="">
            <span class="d-none d-lg-block">PostAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center mt-3" method="GET" action="{{ route('search') }}">
            <input type="search" name="search" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">{{ $data }}</span>
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
                        {{ Auth::user()->name }}</span>
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
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('showprofile') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
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


<!-- ======= Sidebar ======= -->
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

<!-- start main section -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">viewpost</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header post-header">
                <p class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="">
                    <img src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Profile" class="rounded-circle"
                        width="50px">
                    <span class="d-none d-md-block ">{{ Auth::user()->lname }}.
                        {{ Auth::user()->name }}
                    </span>
                </p>
            </div>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $post->image) }}" class="img-fluid rounded-start"
                            alt="image not  support">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title post-content">{{ $post->content }}</h3>
                            <p class="text-justify post-description">{{ $post->description }}</p>
                        </div>
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row fs-12">
                                <div class="like p-2 cursor">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span class="ml-1">Like</span>
                                </div>
                                <div class="like p-2 cursor action-collapse" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-1" href="staticBackdrop">
                                    <i class="fa fa-commenting-o" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <span class="ml-1">Comment</span>
                                    </i>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">post Comment
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <div class="d-flex flex-row align-items-start">
                                                        <img class="rounded-circle"
                                                            src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                    </div>
                                                    <span class="">
                                                        <textarea class="form-control shadow-none textarea comment-text mt-3 ">
                                                        </textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Post
                                                    comment
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="like p-2 cursor action-collapse" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-2" href="#collapse-2">
                                    <i class="fa fa-share"></i>
                                    <span class="ml-1">Share</span>
                                </div>
                            </div>
                        </div>

                        <div id="collapse-2" class="p-2 collapse" data-parent="">
                            <div class="">
                                <i class="fa fa-facebook rounded-circle p-3"></i>
                                <i class="fa fa-twitter rounded-circle p-3"></i>
                                <i class=" fa fa-linkedin rounded-circle p-3"></i>
                                <i class="fa fa-instagram rounded-circle p-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- ======= Footer ======= -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
