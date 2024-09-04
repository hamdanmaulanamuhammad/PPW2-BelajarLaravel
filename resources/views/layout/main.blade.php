<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <script src="/js/script.js"></script>
    <header>
        <h1>Ini adalah header</h1>
    </header>

    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>Ini adalah footer</p>
    </footer>
</body>
</html>
