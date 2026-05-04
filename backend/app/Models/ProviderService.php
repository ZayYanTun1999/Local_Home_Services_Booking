<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    //
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
