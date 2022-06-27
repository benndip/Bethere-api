<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
    use HasFactory;

    public function towns()
    {
        return $this->belongsToMany(Town::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
