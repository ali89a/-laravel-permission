<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Gauwal</title>
    @include('admin.partials.header-style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('admin.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
         @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('admin.partials.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('admin.partials.footer-script')

</body>

</html>