<?php
/**
 * Created by PhpStorm.
 * User: ploggmedia
 * Date: 2017-01-26
 * Time: 8:44 AM
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nemaxe | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script type="text/javascript"> window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"></script>')</script>

</script>
</head>

<body>
    <!-- Fixed navbar -->
    @include('layouts.menu')

    <div id="blue">
        <div class="container">
            <div class="row">
                <h3 class="text-capitalize">@yield('blue-wrap')</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->

    <!-- Content -->
    <div class="container-fluid mt">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="col-lg-8 mb">
                    @yield('content')
                    <div class="spacing"></div>
                    </div>
                    <div class="col-lg-4" id="sidebar-wrapper">
                        @include('layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('layouts.footer')

</body>
</html>
