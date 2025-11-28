<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'КИНОС')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { background-color: #f8f9fa; color: #343a40; }
        .card { border-radius: 0.5rem; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .btn-primary { background-color: #0d6efd; border: none; }
        footer { background-color: #0d6efd; color: #fff; padding: 1rem 0; }
        footer a { color: #fff; margin: 0 0.5rem; }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">КИНОС</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Фильмы</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movies.create') }}">Добавить фильм</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Flash messages --}}
    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Шинвари Шакируллах</p>
            <div>
                <a href="https://github.com/Shakirullah01"><i class="fab fa-github fa-lg"></i></a>
                <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="https://vk.com/shakirullah"><i class="fab fa-vk fa-lg"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
