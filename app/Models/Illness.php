<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    protected $hidden = ['pivot'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'illness_user','illnessId','userId')->withTimestamps();
    }

    public function medications()
    {
        return $this->belongsToMany(Medication::class, 'illness_medication','illnessId','medicationId')->withoutPivot()->withTimestamps();
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'illness_symptom','illnessId','symptomId')->withTimestamps();
    }

    public function dietaryRecommendations()
    {
        return $this->hasMany(DietaryRecommendation::class, 'illnessId','id')->withTimestamps();
    }
    
}
