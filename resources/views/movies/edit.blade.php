@extends('layouts.app')

@section('title', 'Редактировать фильм')

@section('content')
<div class="container" style="max-width: 700px;">
    <h2 class="text-primary mb-4">Редактировать фильм</h2>
    <div class="card p-4 shadow-sm mb-4">
        @include('movies._form', ['action' => route('movies.update', $movie->id), 'method' => 'PUT', 'movie' => $movie])
    </div>
</div>
@endsection
