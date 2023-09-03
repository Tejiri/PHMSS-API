<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['reason',  'startTime', 'endTime', 'date', 'status', 'patientId', 'doctorId'];


    public function patient()
    {
        return $this->belongsTo(User::class, 'patientId', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }
}
