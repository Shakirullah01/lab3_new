<form method="POST" action="{{ $action }}" enctype="multipart/form-data" novalidate class="mx-auto" style="max-width:600px;">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Название</label>
        <input type="text" name="title" class="form-control" required maxlength="255" value="{{ old('title', $movie->title ?? '') }}">
        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Год</label>
        <input type="number" name="year" class="form-control" required min="1888" max="2100" value="{{ old('year', $movie->year ?? '') }}">
        @error('year') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Описание</label>
        <textarea name="description" class="form-control" required minlength="10">{{ old('description', $movie->description ?? '') }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Изображение</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @if(!empty($movie->image_path))
            <img src="{{ asset('storage/' . $movie->image_path) }}" class="mt-2 img-fluid rounded" style="max-width:150px;">
        @endif
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary" type="submit">Сохранить</button>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Отмена</a>
</form>
