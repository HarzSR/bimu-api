<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    public function device()
    {
        return $this->belongsTo('App\Models\Device','device_mac','mac_address');
    }
}
