<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reveiws()
    {
        return $this->hasMany(Review::class);
    }
}
