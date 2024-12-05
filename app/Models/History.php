<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'reviewID'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'paymentID', 'paymentID');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'reviewID', 'reviewID');
    }
}
