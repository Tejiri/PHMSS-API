<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceRating extends Model
{

    protected $fillable = [
        "rating", "description", "patientId", "doctorId"
    ];


    use HasFactory;

    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patientId', 'id');
    }
}
