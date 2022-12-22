<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tour;

class TourType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;
    /**
     * Get all of the comments for the TourType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tours()
    {
        return $this->hasMany(Tour::class, 'type_id', 'id');
    }
}