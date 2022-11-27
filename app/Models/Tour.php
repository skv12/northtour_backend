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
}
