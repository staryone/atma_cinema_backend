<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'paymentID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'paymentID',
        'userID',
        'screeningID',
        'paymentMethod',
        'paymentStatus',
        'paymentDate',
        'totalPayment',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->paymentID = self::generatePaymentID();
        });
    }

    public static function generatePaymentID()
    {
        do {
            $paymentID = 'PAY' . strtoupper(Str::random(5));
        } while (self::where('paymentID', $paymentID)->exists());

        return $paymentID;
    }
}
