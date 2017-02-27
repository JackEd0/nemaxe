<?php
/**
 * Date: 2017-02-23
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nemaxe | @yield('title')</title>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script> window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>

    <!-- Bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script>if(typeof($.fn.modal) === 'undefined') {document.write('<script src="/js/bootstrap.min.js"><\/script>')}</script>

    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" ></script>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/less/styles.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Fixed navbar -->
    @include('layouts.menu')

    <!-- Content -->
    <div class="container-fluid mtb">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('layouts.footer')

</body>
</html>
