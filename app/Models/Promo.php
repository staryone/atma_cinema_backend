<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $primaryKey = 'promoID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'promoID',
        'name',
        'description',
        'pathImage',
        'isFnb',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->promoID = self::generatePromoID();
        });
    }

    public static function generatePromoID()
    {
        do {
            $promoID = 'PMR' . strtoupper(Str::random(5));
        } while (self::where('promoID', $promoID)->exists());

        return $promoID;
    }
}
