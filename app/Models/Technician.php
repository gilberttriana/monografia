<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'specialty', 'location', 'years_experience', 'image_path', 'is_verified', 'is_available', 'services'])]
class Technician extends Model
{
    /**
     * @return HasMany<TechnicianRating, $this>
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(TechnicianRating::class);
    }

    protected function casts(): array
    {
        return [
            'services' => 'array',
            'is_verified' => 'boolean',
            'is_available' => 'boolean',
        ];
    }
}
