<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    public function specialenevts()
    {
        return $this->hasMany(Specialevent::class);
    }

    public function region()
    {
        return $this->belongsTo(Country::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function placetype()
    {
        return $this->belongsToMany(Placetype::class);
    }
}
