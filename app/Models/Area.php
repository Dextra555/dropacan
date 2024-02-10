<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city'
    ];

    public function city_detail()
    {
        return $this->belongsTo(City::class, 'city');
    }
}
