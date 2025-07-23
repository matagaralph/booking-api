<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoObject extends Model {
    protected $fillable = ['city_id', 'name', 'lat', 'long'];
}
