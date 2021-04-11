<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'score',
        'zodiac_id'
    ];

    protected $dates = [
        'date'
    ];

    public function zodiac()
    {
        return $this->belongsTo(Zodiac::class);
    }
}
