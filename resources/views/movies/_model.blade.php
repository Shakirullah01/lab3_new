<div class="row">
    <div class="col-md-5">
        @if($movie->image_url)
            <img src="{{ $movie->image_url }}" class="img-fluid" alt="{{ $movie->title }}">
        @endif
    </div>
    <div class="col-md-7">
        <h4>{{ $movie->title }} ({{ $movie->year }})</h4>
        <p>{{ $movie->description }}</p>
    </div>
</div>
