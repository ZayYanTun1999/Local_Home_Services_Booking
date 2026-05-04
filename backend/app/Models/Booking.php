<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public function providerService()
    {
        return $this->belongsTo(ProviderService::class);
    }
}
