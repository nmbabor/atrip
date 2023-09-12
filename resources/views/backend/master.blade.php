<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ readConfig('site_name') }}</title>

    <!-- FAVICON ICON -->
    <link rel="shortcut icon" href="{{ assetImage(readconfig('favicon_icon')) }}" type="image/svg+xml">

    <!-- FAVICON ICON APPLE -->
    <link href="{{ assetImage(readconfig('favicon_icon_apple')) }}" rel="apple-touch-icon">
    <link href="{{ assetImage(readconfig('favicon_icon_apple')) }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ assetImage(readconfig('favicon_icon_apple')) }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ assetImage(readconfig('favicon_icon_apple')) }}" rel="apple-touch-icon" sizes="144x144">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/min/dropzone.min.css') }}">
    {{-- datatable --}}
    <link rel="stylesheet" href="{{ asset('backend/dist/css/datatable/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/datatable/buttons.dataTables.min.css') }}">
    {{-- custom style --}}
    <link rel="stylesheet" href="{{ asset('backend/dist/css/custom-style.css') }}">

    @stack('style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <x-simple-alert />

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="Logo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('backend.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="{{ route('frontend.home') }}" class="brand-link">
                <img src="{{ assetImage(readconfig('site_logo')) }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ readConfig('site_name') }}</span>
            </a>

            <!-- Sidebar -->
            @include('backend.layouts.sidebar')
            <!-- /.sidebar -->

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                @yield('title')
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                @yield('title_button')
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">

                    <!-- content -->
                    @yield('content')
                    <!-- /.content -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.Main content -->
        </div>
        <!-- /.content-wrapper -->

        @include('backend.layouts.footer')
        <!-- Modal -->
        <div class="modal fade" id="resourceDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-4">
                    <!-- <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-trash3 text-danger"></i> Delete confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->


                    <div class="modal-body text-center">
                        <span>
                            <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="4" width="48" height="48" rx="24"
                                    fill="#FEE4E2" />
                                <path
                                    d="M28 24V28M28 32H28.01M38 28C38 33.5228 33.5228 38 28 38C22.4772 38 18 33.5228 18 28C18 22.4772 22.4772 18 28 18C33.5228 18 38 22.4772 38 28Z"
                                    stroke="#D92D20" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <rect x="4" y="4" width="48" height="48" rx="24"
                                    stroke="#FEF3F2" stroke-width="8" />
                            </svg>
                        </span>

                        <div class="delete-info">
                            <h3 class="delete-title"> Delete</h3>
                            <p class="delete-text">Are you sure you want to delete it? This action cannot be undone.
                            </p>
                        </div>

                        <div class="d-flex gap-2 w-100">
                            <button type="button" class="modal-cancel-btn flex-fill"
                                data-bs-dismiss="modal">Close</button>
                            {!! Form::open(['method' => 'delete', 'class' => 'flex-fill']) !!}
                            <button type="submit" class="modal-confirm-btn w-100"> <i class="bi bi-trash3"></i>
                                Confirm</button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- custom script --}}
    <script src="{{ asset('backend/js/custom-script.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('backend/plugins/dropzone/min/dropzone.min.js') }}"></script>

    {{-- datatable --}}
    <script src="{{ asset('backend/dist/js/datatable/datatable.js') }}"></script>
    <script src="{{ asset('backend/dist/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/datatable/dataTables.buttons.min.js') }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-14PMPDZXRQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-14PMPDZXRQ');
    </script>
    <script type="text/javascript">
        function resourceDelete(delete_url) {
            "use strict"
            jQuery('#resourceDelete').modal('show', {
                backdrop: 'static'
            });
            $('#resourceDelete form').attr('action', delete_url);
        }
    </script>



    @stack('script')

</body>

</html>