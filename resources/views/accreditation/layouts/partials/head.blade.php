<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="FCSIT, BUK Course Allocation Application">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Mansur Babagana">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        @if(isset($page_title))
            {{$page_title}} |
        @endif
Department of Computer Science, BUK - Course Allocation Application
    </title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
@yield('css-before')
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome-pro-6/css/all.css')}}">--}}
    <!-- End css -->
    @yield('css-after')
</head>
