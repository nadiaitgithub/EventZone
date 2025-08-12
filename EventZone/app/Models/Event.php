<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'price',
        'user_id',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'total_seats',
        'seats'
    ];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
