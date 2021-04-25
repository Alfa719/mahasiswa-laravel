<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>Sign In</title>
        
        @include('layouts.style')

    </head>

<body class="bg-default">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.script')
    @yield('script')
</body>

</html>
