<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'num_of_rows',
        'num_of_seats',
        'price_vip',
        'price_regular',
    ];

    public function session() {
        return $this->hasMany(Session::class);
    }

    public $timestamps = false;
}
