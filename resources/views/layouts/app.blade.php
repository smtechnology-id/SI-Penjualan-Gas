<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard Admin || SIPRAKTIF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan Restoratif" name="description" />
    <meta content="Smtechnology.id" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-landing/images/SI PRAKTIF (1).png') }}" type="image/x-icon">


    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css">

    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search d-none d-lg-block">

                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">




                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('assets/images/user.jpg') }}" style="width: 40px; height: 40px; object-fit: cover" alt="user-image"
                                    width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }} <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->



        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title" >Pangkalan Gas LPG Eko Sumanto</li>


                    @if (Auth::user()->role == 'admin')
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                                <i class="ri-home-3-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dataBarang') }}" class="side-nav-link">
                                <i class="ri-layout-grid-fill"></i>
                                <span> Data Barang </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dataKonsumen') }}" class="side-nav-link">
                                <i class="ri-group-fill"></i>
                                <span> Data Konsumen </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dataPenjualan') }}" class="side-nav-link">
                                <i class="ri-price-tag-3-fill"></i>
                                <span> Data Penjualan </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dataPembelian') }}" class="side-nav-link">
                                <i class="ri-shopping-cart-2-fill"></i>
                                <span> Data Pembelian </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dataAdmin') }}" class="side-nav-link">
                                <i class="ri-home-3-line"></i>
                                <span> Data Admin </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                                <i class="ri-user-settings-fill"></i>
                                <span> Laporan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.laporanKonsumen') }}">Laporan Konsumen</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.laporanPenjualan') }}">Laporan Penjualan</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.laporanPembelian') }}">Laporan Pembelian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif




                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="container-fluid mt-3">
                                    <div class="card">
                                        <div class="card-body py-2">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Developed With Love By SMTechnology.id</b>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    
    <!-- END wrapper -->
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>

    <script>
        $('table').dataTable();
    </script>
</body>

</html>
