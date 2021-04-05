<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Catálogo Digital</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @component('component_navbar')
    @endcomponent
    <div class="container">
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>  
    <footer class="text-muted py-5">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Home</a>
          </p>
        </div>
      </footer> 
      @hasSection ('javascript')
          @yield('javascript')
      @endif

</body>
</html>
