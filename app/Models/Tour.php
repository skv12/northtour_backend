<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tour extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'tours';
    protected $fillable = [
        'title',
        'active',
        'type_id',
        'description'
    ];
    /**
     * Get the user that owns the Tour
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(TourType::class, 'type_id', 'id');
    }
}
