{{-- filepath: resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS (or your preferred CSS) -->
    <link href="{{ asset('admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gradient-primary">
    <div class="container">
        @yield('content')
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>