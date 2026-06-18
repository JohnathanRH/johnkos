<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kost extends Model
{
    use HasFactory;
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function kamars(){
        return $this->hasMany(Kamar::class, 'kost_id', 'id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

}
