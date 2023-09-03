<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessages extends Model
{
    use HasFactory;


    protected $fillable = [
       'read', 'message', 'type', 'videoUrl', 'patientId', 'doctorId'
    ];

    function patient()
    {
        return $this->belongsTo(User::class, 'patientId', 'id');
    }
    function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }
}
