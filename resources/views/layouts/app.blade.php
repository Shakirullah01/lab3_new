<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'КИНОС')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f0f4f8;
            color: #333;
        }
        header {
            background-color: #0d6efd;
            color: #fff;
            padding: 1rem 0;
        }
        header .logo img {
            height: 50px;
            margin-right: 10px;
        }
        header nav a {
            color: #fff;
            margin-right: 15px;
            font-weight: 500;
        }
        footer {
            background-color: #0d6efd;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        .card img {
            max-height: 250px;
            object-fit: contain;
        }
        .btn {
            margin-top: 0.5rem;
        }
        form .form-control {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<header class="d-flex align-items-center justify-content-between container">
    <div class="logo d-flex align-items-center">
        <img src="{{ asset('/images/logo.png') }}" alt="Logo">
        <span class="h4 mb-0">КИНОС</span>
    </div>
    <nav>
        <a href="{{ route('movies.index') }}">Home</a>
        <a href="{{ route('movies.create') }}">Add Movie</a>
    </nav>
</header>

<main class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<footer>
    &copy; Шинвари Шакируллах &nbsp;
    <a href="https://github.com/Shakirullah01" target="_blank" class="text-white me-2"><i class="fab fa-github"></i></a>
    <a href="#" target="_blank" class="text-white me-2"><i class="fab fa-twitter"></i></a>
    <a href="https://vk.com/shakirullah" target="_blank" class="text-white"><i class="fab fa-vk"></i></a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
