<!DOCTYPE html>
<html>

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Favicon -->
    <x-favicon />
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li><a href="{{ route('google') }}">google nocapcha</a></li>
        </ul>
    </nav>
    <h1>Header</h1>
    {{ $slot }}
    <h1>Footer</h1>
</body>

</html>
