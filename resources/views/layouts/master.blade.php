<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.meta')

<body>
    @include('layouts.navbar')
    
    <main class="m-0 p-0">
        @yield('main-content')
    </main>

    {{-- @include('layouts.footer')   --}}

    {{-- Default JS Plugins --}}
    @section('js-plugins')
        <script src="{{ url('assets/plugins/jQuery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ url('assets/plugins/instafeed/instafeed.min.js') }}"></script>
    @endsection
    <!-- Plugins -->
    @yield('js-plugins')

    {{-- Default Custom JS --}}
    @section('custom-js')
        <script src="{{ url('assets/js/script.js') }}"></script>
    @endsection
    <!-- Main Javascript-->
    @yield('custom-js')
</body>

</html>
