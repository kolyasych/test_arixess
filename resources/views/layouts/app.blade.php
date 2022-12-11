<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="app">
    @include('includes.header')

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script>

    let myDropzone = new Dropzone(".dropzone", {
        url: '/applications/store',
        resizeWidth: 320,
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: '.jpg, .txt, .gif, .png',
        maxFiles: 1,
        autoProcessQueue: false,
        init: function () {
            this.on('addedfile', function (file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    });
</script>
</body>
</html>
