<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\City;
use App\Models\Citizen;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cities() {
        return $this->hasMany(City::class);
    }

    public function citizens() {
        return $this->hasMany(Citizen::class);
    }
}
