<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'director',
        'duration',
        'punctuation',
        'user_id'
    ];

    public $timestamps = false;

    public function actors()
    {
        return $this->hasMany(Actor::class, 'movie_id', 'id');
    }
}
