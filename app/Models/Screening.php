<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Screening extends Model
{
    use HasFactory;

    protected $primaryKey = 'screeningID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'screeningID',
        'movieID',
        'studioID',
        'seatLayout',
        'date',
        'time',
        'price',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->screeningID = self::generateScreeningID();
        });
    }

    public static function generateScreeningID()
    {
        do {
            $screeningID = 'SCR' . strtoupper(Str::random(5));
        } while (self::where('screeningID', $screeningID)->exists());

        return $screeningID;
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieID', 'movieID');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'studioID', 'studioID');
    }
}
