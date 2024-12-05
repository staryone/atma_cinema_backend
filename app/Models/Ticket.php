<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'ticketID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'ticketID',
        'paymentID',
        'seatID',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ticketID = self::generateTicketID();
        });
    }

    public static function generateTicketID()
    {
        do {
            $ticketID = 'TIC' . strtoupper(Str::random(5));
        } while (self::where('ticketID', $ticketID)->exists());

        return $ticketID;
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'paymentID', 'paymentID');
    }
}
