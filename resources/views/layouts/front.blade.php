<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('section')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/with_text.png') }}" rel="icon">
    {{-- <link href="{{ asset('dashboard/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    {{-- Data Tables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/bungas.jpg') }}" alt="">
                <span class="d-none d-lg-block">BungasExpress</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item ">
                    <div class="btn btn-dark btn-sm">
                        <span id="txt"></span>
                    </div>
                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        @if (Auth::user()->role == 'admin')
                            <img src=" {{ asset('dashboard/img/admin.jpeg') }}" alt="Profile" class="rounded-circle">
                        @elseif (Auth::user()->role == 'pelanggan')
                            <img src=" {{ asset('dashboard/img/user.png') }}" alt="Profile" class="rounded-circle">
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->nama }}</h6>
                            <span>{{ Auth::user()->username }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('profil', ['id' => 1]) }}">
                                <i class="bi bi-person"></i>
                                <span>Profil Ku</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}">
                                <i class="bi bi-house"></i>
                                <span>Ke Beranda</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href=" {{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('profil') }}">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li><!-- End Profile Page Nav -->

            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('pelanggan') }}">
                        <i class="bi bi-people"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li><!-- End Data Pelanggan Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('barang') }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Data Barang</span>
                    </a>
                </li><!-- End Data Barang Page Nav -->
            @endif

            @if (Auth::user()->role == 'pelanggan')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-register.html">
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat</span>
                    </a>
                </li><!-- End Riwayat Page Nav -->
            @endif

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('page-title')

        <section class="section dashboard">
            <div class="row">
                @yield('content')

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @yield('custom-modal')

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/quill/quill.js') }}"></script>

    <script src="{{ asset('dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/php-email-form/validate.js') }}"></script>

    {{-- Data Tables JS --}}
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

    {{-- Select2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template Main JS File-->
    <script src="{{ asset('dashboard/js/main.js') }}"></script>

    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);

            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        window.onload = startTime()
    </script>

    @yield('custom-js')
</body>

</html>
