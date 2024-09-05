<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home - {{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/css/styles.css" rel="stylesheet" />
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        html,
        body, .content{
            min-height: 100% !important;
            height: 100%;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="content container-fluid">
        @yield('content')
    </div>

    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; {{ env('APP_NAME') }} 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>