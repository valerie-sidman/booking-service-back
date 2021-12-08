<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'hall_id',
        'hours',
        'minutes',
    ];

    public function hall() {
        return $this->belongsTo(Hall::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public $timestamps = false;
}
