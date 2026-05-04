<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'city_id',
        'township_id',
        'title',
        'description',
        'price',
        'duration_minutes'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function providers()
    {
        return $this->belongsToMany(User::class, 'provider_services', 'service_id', 'provider_id');
    }
}