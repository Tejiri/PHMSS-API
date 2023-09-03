<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "dosage",
        "frequency",
        "imageUrl"
    ];

    public function illnesses()
    {
        return $this->belongsToMany(Medication::class, 'illness_medication', 'medicationId', 'illnessId')->withTimestamps();
    }
}
