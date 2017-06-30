<?php
/**
* Created by PhpStorm.
* User: ploggmedia
* Date: 2017-01-26
* Time: 8:44 AM
*/
$locale_lang = \App::getLocale();
?>
<!DOCTYPE html>
<html lang="{{ $locale_lang }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nemaxe | @yield('title')</title>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script > window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/views.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
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
    <div class="container mtb">
        <div class="col-lg-12">
            <div class="col-lg-8 mb padding-r">
                @yield('content')
                <div class="spacing"></div>
            </div>
            <div class="col-lg-4" id="sidebar-wrapper">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- Bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script>if(typeof($.fn.modal) === 'undefined') {document.write('<script src="/js/bootstrap.min.js"><\/script>')}</script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js"></script>
    <script>
        var locale_lang = '{{ $locale_lang }}';
    </script>
    @yield('scripts')
</body>
</html>
