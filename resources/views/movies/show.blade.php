@extends('layouts.app')

@section('title', $movie->title)

@section('content')
<div class="row">
    <div class="col-md-5">
        @if($movie->image_path)
            <img src="{{ asset('storage/' . $movie->image_path) }}" class="img-fluid" style="width:100%;" alt="{{ $movie->title }}">
        @endif
    </div>
    <div class="col-md-7">
        <h2 class="text-primary">{{ $movie->title }} ({{ $movie->year }})</h2>
        <p>{{ $movie->description }}</p>

        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Редактировать</a>
        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Назад к списку</a>
    </div>
</div>
@endsection
