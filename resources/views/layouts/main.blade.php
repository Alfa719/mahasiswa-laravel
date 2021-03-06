<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>@yield('title')</title>
        
        @include('layouts.style')

    </head>

<body>
    @include('layouts.sidebar')

    <div class="main-content" id="panel">

        @include('layouts.navbar')

            @yield('content')
            
        {{-- @include('layouts.footer') --}}
        </div>
    </div>
    @include('layouts.script')
    @yield('script')
</body>

</html>