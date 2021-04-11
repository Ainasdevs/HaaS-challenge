<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zodiac extends Model
{
    use HasFactory;

    protected $table = "zodiac_signs";

    protected $fillable = [
        'name'
    ];

    public function horoscopes()
    {
        return $this->hasMany(Horoscope::class);
    }
}
