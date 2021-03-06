<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('') }}css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('') }}css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    <!-- Navigation -->
    @include('components.home-navigation')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    @yield('page-header')
                    <small>@yield('page-header-sub')</small>
                </h1>

                <!-- Blog Post -->
                @include('components.home-artical')

                <!-- Pager -->
                @include('components.home-pager')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                @include('components.search-well')

                <!-- Blog Categories Well -->
                @include('components.categories-well')

                <!-- Side Widget Well -->
                @include('components.widget-wall')

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        @include('components.footer')

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ asset('') }}js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('') }}js/bootstrap.min.js"></script>

</body>

</html>
