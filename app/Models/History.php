<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $primaryKey = 'historyID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'historyID',
        'userID',
        'paymentID',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->historyID = self::generateHistoryID();
        });
    }

    public static function generateHistoryID()
    {
        do {
            $historyID = 'HIS' . strtoupper(Str::random(5));
        } while (self::where('historyID', $historyID)->exists());

        return $historyID;
    }
}
