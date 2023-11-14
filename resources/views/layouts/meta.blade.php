<head>
    <meta charset="utf-8">

    <!-- Title -->
@yield('title')

    <!-- Mobile Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    {{-- Default CSS Plugins --}}
@section('css-plugins')
    <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/slick/slick.css') }}">
@endsection
    <!-- Plugins -->
@yield('css-plugins')

    {{-- Default Custom CSS --}}
@section('custom-css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" media="screen">
@endsection
    <!-- Main Stylesheet -->
@yield('custom-css')


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon">

    <meta property="og:title" content="Yaaa" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
