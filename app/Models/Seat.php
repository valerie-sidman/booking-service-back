<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'type',
        'hall_id',
        'ticket_id',
    ];

    public $timestamps = false;
}
