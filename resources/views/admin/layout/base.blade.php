<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Админ - панель</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/admin/css/adminStyle.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/main.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    @yield('style')

</head>

<body>

<!-- Main navbar -->
@include('admin.layout.navbar')
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('admin.layout.sidebar')
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
                @yield('header')
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<script src="/admin/js/adminCore.min.js"></script>
<script src="/admin/js/app.min.js"></script>
@yield('js')
<script src="/admin/js/pnotify.min.js"></script>
<script src="/admin/js/main.js"></script>



</body>
</html>
