<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image_path',
        'gender',
        'role',
        'home_no',
        'street',
        'ward',
        'township_id',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 🔥 RELATIONSHIPS

    // belongs to township
    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    // provider → services (many-to-many)
    public function services()
    {
        return $this->belongsToMany(Service::class, 'provider_services', 'provider_id', 'service_id');
    }

    // provider → service areas (many-to-many)
    public function serviceAreas()
    {
        return $this->belongsToMany(Township::class, 'provider_areas', 'provider_id', 'township_id');
    }

    // 🔥 helper (very useful)
    public function isProvider()
    {
        return $this->role === 'service_provider';
    }
    public function reviews()
    {
        return $this->hasManyThrough(
            Review::class,
            Booking::class,
            'provider_service_id', // bookings FK
            'booking_id',          // reviews FK
            'id',
            'id'
        );
    }
}