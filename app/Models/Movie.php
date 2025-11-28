<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'year',
        'description',
        'image_path',
    ];

    public function setYearAttribute($value)
    {
        $this->attributes['year'] = (int)$value;
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
