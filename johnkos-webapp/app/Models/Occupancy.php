<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupancy extends Model
{
    use HasFactory;

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
}
