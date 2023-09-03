<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'firstName',
        'lastName',
        'middleName',
        'dateOfBirth',
        'address',
        'postCode',
        'phoneNumber',
        'role',
        'gender',
        'emergencyName',
        'emergencyPhoneNumber',
        'emergencyEmail',
        'emergencyRelationship'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,'doctorId','id');
    }

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, 'illness_user', 'userId', 'illnessId')->withTimestamps();
    }


    function serviceRating(): HasOne
    {
        return $this->hasOne(ServiceRating::class,'patientId','id');
    }

    function messages():HasMany{
        return $this->hasMany(UserMessages::class,'patientId','id');
    }

    function appointments():HasMany{
        return $this->hasMany(Appointment::class,'patientId','id');
    }
}
