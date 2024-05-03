<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Country;
use App\Models\City;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = ['name','city_id','country_id'];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

}
