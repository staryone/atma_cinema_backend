<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Studio extends Model
{
    use HasFactory;

    protected $primaryKey = 'studioID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $timestamps = false;

    protected $fillable = [
        'studioID',
        'name',
        'capacity'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->studioID = self::generateStudioID();
        });
    }

    public static function generateStudioID()
    {
        do {
            $studioID = 'STD' . strtoupper(Str::random(5));
        } while (self::where('studioID', $studioID)->exists());

        return $studioID;
    }
}
