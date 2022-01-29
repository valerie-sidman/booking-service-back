<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'production_country',
    ];

    public function hall() {
        return $this->belongsToMany('App\Models\Hall', 'sessions', 'movie_id', 'hall_id')
            ->groupBy('hall_id', 'movie_id')
            ->where('open', '=', '1');
    }

    public $timestamps = false;
}
