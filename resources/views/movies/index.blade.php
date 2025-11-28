@extends('layouts.app')

@section('title', 'Список фильмов')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary"> Наши лучшие Фильмы месяца</h2>
    <a href="{{ route('movies.create') }}" class="btn btn-success">Добавить фильм</a>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($movies as $movie)
    <div class="col">
        <div class="card h-100 shadow-sm">
            @if($movie->image_path)
                <img src="{{ asset('storage/' . $movie->image_path) }}" class="card-img-top" alt="{{ $movie->title }}">
            @else
                <img src="{{ asset('placeholder.png') }}" class="card-img-top" alt="No image">
            @endif
            <div class="card-body">
                <span class="badge bg-primary mb-2">Фильм</span>
                <h5 class="card-title">{{ $movie->title }} ({{ $movie->year }})</h5>
                <p class="card-text text-secondary">{{ Str::limit($movie->description, 120) }}</p>
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-outline-warning btn-sm">Редактировать</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $movies->links() }}
</div>
@endsection
