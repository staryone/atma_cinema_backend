<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'movieID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'movieID',
        'movieTitle',
        'duration',
        'synopsis',
        'director',
        'writers',
        'ageRating',
        'genre',
        'cover',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->movieID = self::generateMovieID();
        });
    }

    public static function generateMovieID()
    {
        do {
            $movieID = 'MOV' . strtoupper(Str::random(5));
        } while (self::where('movieID', $movieID)->exists());

        return $movieID;
    }
}
