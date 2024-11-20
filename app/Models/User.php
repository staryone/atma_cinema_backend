<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'userID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'userID',
        'fullName',
        'email',
        'password',
        'dateOfBirth',
        'registrationDate',
        'gender',
        'phoneNumber',
        'profilePicture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->userID = self::generateUserID();
        });
    }

    public static function generateUserID()
    {
        do {
            $userID = 'USR' . strtoupper(Str::random(5));
        } while (self::where('userID', $userID)->exists());

        return $userID;
    }
}
