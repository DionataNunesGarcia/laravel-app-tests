<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="container px-4 mx-auto py-4">
        <div class="sm:flex sm:items-center sm:justify-between">
            @yield('header')
        </div>
        <div>
            <x-messages/>
            @yield('content')
        </div>
    </section>
</body>
</html>