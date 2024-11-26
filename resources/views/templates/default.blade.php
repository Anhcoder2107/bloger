
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="pngwing.com.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/monokai-sublime.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    @if($title == 'Blog' or $title == 'Post')
        <div class="home {{ $background_default }}">
            @include('templates.header')
        
            @yield('body')
        
            @include('templates.footer')
        </div>

    @elseif ($title == 'Home')
        <div class="home {{ $background_default }}">
            @include('templates.header')
        
            @yield('body')
        </div>
    @else
        <div class="home {{ $background_default }}">
            @include('templates.header')
        
            @yield('body')
        
        
            @include('templates.footer')
        </div>

    @endif

</body>
</html>