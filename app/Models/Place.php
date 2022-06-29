<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'about', 'placetype_id', 'town_id', 'lat', 'lng'];
    protected $with = ['placeImages'];

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function placeImages()
    {
        return $this->hasMany(PlaceImage::class);
    }

    public function placeType()
    {
        return $this->belongsTo(PlaceType::class);
    }

    public function pano()
    {
        return $this->hasOne(Pano::class);
    }

    public function threeds()
    {
        return $this->hasMany(Threed::class);
    }
}
