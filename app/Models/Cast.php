<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cast extends Model
{
    use HasFactory;

    protected $primaryKey = 'castID';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'castID',
        'movieID',
        'name',
        'pathImage',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->castID = self::generateCastID();
        });
    }

    public static function generateCastID()
    {
        do {
            $castID = 'CST' . strtoupper(Str::random(5));
        } while (self::where('castID', $castID)->exists());

        return $castID;
    }
}
