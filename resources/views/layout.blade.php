<!DOCTYPE html>
<head>
    <title>
        @yield('title')
    </title>
    {{--  Tailwind  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(resource_path('css/app.css'))
</head>

<body>
    @yield('content')
</body>




