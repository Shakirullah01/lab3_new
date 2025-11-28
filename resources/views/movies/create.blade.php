@extends('layouts.app')

@section('title', 'Добавить фильм')

@section('content')
<div class="container" style="max-width: 700px;">
    <h2 class="text-primary mb-4">Добавить новый фильм</h2>
    <div class="card p-4 shadow-sm mb-4">
        @include('movies._form', ['action' => route('movies.store'), 'method' => 'POST'])
    </div>
</div>
@endsection
