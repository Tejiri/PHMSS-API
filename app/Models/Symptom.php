<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, 'illness_symptom','symptomId','illnessId')->withTimestamps();;
    }
}
