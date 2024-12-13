<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;

    protected $primaryKey = 'messageID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'messageID',
        'paymentID',
        'title',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->messageID = self::generateMessageID();
        });
    }

    public static function generateMessageID()
    {
        do {
            $messageID = 'MSS' . strtoupper(Str::random(5));
        } while (self::where('messageID', $messageID)->exists());

        return $messageID;
    }
}


