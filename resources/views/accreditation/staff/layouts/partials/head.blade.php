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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome-pro-6/css/all.css')}}">
    <!-- End css -->
    <style>
        label{
            font-weight: bold;
        }

        .mt-n0 {
            margin-top: 0 !important;
        }
        .mt-n1 {
            margin-top: -0.25rem !important;
        }
        .mt-n2 {
            margin-top: -0.5rem !important;
        }
        .mt-n3 {
            margin-top: -1rem !important;
        }
        .mt-n4 {
            margin-top: -1.5rem !important;
        }
        .mt-n5 {
            margin-top: -3rem !important;
        }

        .mb-n0 {
            margin-bottom : 0 !important;
        }
        .mb-n1 {
            margin-bottom : -0.25rem !important;
        }
        .mb-n2 {
            margin-bottom : -0.5rem !important;
        }
        .mb-n3 {
            margin-bottom : -1rem !important;
        }
        .mb-n4 {
            margin-bottom : -1.5rem !important;
        }
        .mb-n5 {
            margin-bottom : -3rem !important;
        }

        .my-n0 {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        .my-n1 {
            margin-top: -0.25rem !important;
            margin-bottom: -0.25rem !important;
        }
        .my-n2 {
            margin-top: -0.5rem !important;
            margin-bottom: -0.5rem !important;
        }
        .my-n3 {
            margin-top: -1rem !important;
            margin-bottom: -1rem !important;
        }
        .my-n4 {
            margin-top: -1.5rem !important;
            margin-bottom: -1.5rem !important;
        }
        .my-n5 {
            margin-top: -3rem !important;
            margin-bottom: -3rem !important;
        }
    </style>
    @yield('css-after')
</head>
