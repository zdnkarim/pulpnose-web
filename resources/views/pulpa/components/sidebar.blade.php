<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PulpNose Dashboard @yield('subtitle')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dboard/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('dboard/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('dboard/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dboard/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dboard/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('dboard/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('dboard/vendors/simple-datatables/dataTables.bootstrap4.css') }}">

    {{-- komen --}}
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <link href="img/favicon.ico" rel="icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('landing/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="container-fluid bg-light position-relative shadow">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
                <a href="/" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                    {{-- <i class="flaticon-042-synthesizer"></i> --}}
                    <span class="text-primary">PulpNose</span>
                </a>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav font-weight-bold mx-auto py-0">
                        <a href="/history" class="nav-item nav-link">Riwayat</a>
                        <a href="/dashboard" class="nav-item nav-link">Dashboard</a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="top:90px;">
                {{-- <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/" class="navbar-brand font-weight-bold text-secondary">

                                <span class="text-primary">PulpNose</span>
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <hr> --}}
                <div class="sidebar-menu">
                    <ul class="menu">

                        @yield('link')

                        <hr>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>@yield('page-title')</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    @yield('navigation')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section my-3">
                    @yield('content')
                </section>
            </div>


            <footer>
                @yield('footer')
            </footer>
        </div>
    </div>

    <div class="modal fade" id="popUpShowModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="popUpDeleteModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <script src="{{ asset('dboard/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dboard/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dboard/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('dboard/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('dboard/js/main.js') }}"></script>

    <script src="{{ asset('dboard/vendors/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('dboard/vendors/simple-datatables/simple-datatables.js') }}"></script> --}}
    <script src="{{ asset('dboard/vendors/simple-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dboard/vendors/simple-datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                scrollX: true,
                "lengthMenu": [
                    [-1, 25, 50, 100, 250, 500],
                    ["", 25, 50, 100, 250, 500]
                ],
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.openShowModal').on('click', function() {
                var dataURL = $(this).attr('data-href');
                $('.modal-content').load(dataURL, function() {
                    $('#popUpShowModal').modal('show');
                });
            });
        });
        $(document).ready(function() {
            $('.openDeleteModal').on('click', function() {
                var dataURL = $(this).attr('data-href');
                $('.modal-content').load(dataURL, function() {
                    $('#popUpDeleteModal').modal('show');
                });
            });
        });
    </script>

    @yield('script')
</body>

</html>
