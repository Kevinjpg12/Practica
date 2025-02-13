<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @stack('header')
    @stack('css')
    @stack('style')
</head>
<body>
    @yield('content')    
    @stack('script')
</body>
</html>