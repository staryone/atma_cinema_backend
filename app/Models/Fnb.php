<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fnb extends Model
{
    use HasFactory;

    protected $primaryKey = 'fnbID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'fnbID',
        'name',
        'category',
        'description',
        'price',
        'pathImage',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->fnbID = self::generateFnbID();
        });
    }

    public static function generateFnbID()
    {
        do {
            $fnbID = 'FNB' . strtoupper(Str::random(5));
        } while (self::where('fnbID', $fnbID)->exists());

        return $fnbID;
    }
}
