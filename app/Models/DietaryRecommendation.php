<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DietaryRecommendation extends Model
{
    use HasFactory;

    protected $fillable = ['illnessId',  'name', 'description', 'imageUrl'];

    function illness(): BelongsTo
    {
        return $this->belongsTo(Illness::class, 'illnessId', 'id');
    }
}
