<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(12);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1888|max:2100',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();

            // Ресайз под 800x600 (подгонка по размеру)
            $image = Image::make($file->getRealPath())
                          ->fit(800, 600, function ($constraint) {
                               $constraint->upsize();
                          });

            // Сохраняем в storage/app/public/movies
            Storage::disk('public')->put('movies/' . $filename, (string) $image->encode());

            $data['image_path'] = 'movies/' . $filename;
        }

        Movie::create($data);

        return redirect()->route('movies.index')->with('success', 'Фильм создан');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1888|max:2100',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            // удалить старое изображение, если есть
            if ($movie->image_path && Storage::disk('public')->exists($movie->image_path)) {
                Storage::disk('public')->delete($movie->image_path);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file->getRealPath())
                          ->fit(800, 600, function ($constraint) {
                               $constraint->upsize();
                          });

            Storage::disk('public')->put('movies/' . $filename, (string) $image->encode());

            $data['image_path'] = 'movies/' . $filename;
        }

        $movie->update($data);

        return redirect()->route('movies.index')->with('success', 'Фильм обновлён');
    }

    public function destroy(Movie $movie)
    {
        // при soft delete запись помечается как удалённая
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Фильм удалён');
    }
}
