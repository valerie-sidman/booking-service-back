<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'num_of_rows',
        'num_of_seats',
        'price_vip',
        'price_regular',
        'open'
    ];

    public function session() {
        return $this->hasMany(Session::class);
    }

    public function getSessionAttribute($value) {
        return DB::table('sessions')
            ->where('movie_id', '=', $value)
            ->where('hall_id', '=', $this->id)
            ->orderBy('hours')
            ->orderBy('minutes')
            ->get();
    }

    public $timestamps = false;
}
