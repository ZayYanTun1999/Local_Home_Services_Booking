<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = ['name', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function providers()
    {
        return $this->belongsToMany(User::class, 'provider_areas', 'township_id', 'provider_id');
    }
}
