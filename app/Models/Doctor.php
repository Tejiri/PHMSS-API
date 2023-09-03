<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['email',  'password'];

    protected $hidden = ['password',  'remember_token'];

    function patients(): HasMany
    {
        return $this->hasMany(User::class,'doctorId','id');
    }

    function serviceRatings(): HasMany
    {
        return $this->hasMany(ServiceRating::class,'doctorId','id');
    }

    function messages():HasMany{
        return $this->hasMany(UserMessages::class,'doctorId','id');
    }

    function appointments():HasMany{
        return $this->hasMany(Appointment::class,'doctorId','id');
    }
}
