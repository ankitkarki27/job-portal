<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Liter&family=Mako&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            /* font-family: 'Plus Jakarta Sans', sans-serif; */
            /* font-family: "Liter", serif; */
            font-family: "Ubuntu", serif;
            background-color: white;
        }
    </style>
    
    @stack('styles') 
</head>
<body class="bg-white">
    @include('partials.navbar')




    {{-- content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>
    {{-- end content --}}





    @include('partials.footer')

    <script>
 
        feather.replace();
    </script>
    
    @stack('scripts')
</body>
</html>