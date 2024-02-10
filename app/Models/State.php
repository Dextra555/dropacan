<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country'
    ];

    public function country_detail()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function cities()
    {
        return $this->hasMany(City::class,  'state', 'id');
    }
}
