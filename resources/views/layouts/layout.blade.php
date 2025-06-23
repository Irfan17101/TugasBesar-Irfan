<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DRYME - Laundry Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="{{ asset('template/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>
