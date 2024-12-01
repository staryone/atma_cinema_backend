<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'reviewID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'reviewID',
        'userID',
        'movieID',
        'comment',
        'rating',
        'reviewDate',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->reviewID = self::generateReviewID();
        });
    }

    public static function generateReviewID()
    {
        do {
            $reviewID = 'REV' . strtoupper(Str::random(5));
        } while (self::where('reviewID', $reviewID)->exists());

        return $reviewID;
    }
}
