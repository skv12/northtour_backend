<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Tour extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'tours';
    protected $fillable = [
        'operator_id',
        'title',
        'active',
        'type_id',
        'description',
        'place',
        'accommodation'
    ];

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(TourType::class, 'type_id', 'id');
    }

    public function packages()
    {
        return $this->belongsToMany(TourPackageType::class, 'tour_packages', 'tour_id', 'tour_package_id');
    }

    public function image(){
        return $this->hasOne(TourImage::class, 'tour_id', 'id')->where('active', true)->oldest();
    }

    public function images(){
        return $this->hasMany(TourImage::class, 'tour_id', 'id');
    }
    public function imagesActive(){
        return $this->hasMany(TourImage::class, 'tour_id', 'id')->where('active', true);
    }

    public function schedules(){
        return $this->hasMany(TourSchedule::class, 'tour_id', 'id');
    }
}
