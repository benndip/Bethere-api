<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threed extends Model
{
    use HasFactory;

    public function place()
    {
        return $this->belongsTos(Place::class);
    }
}
