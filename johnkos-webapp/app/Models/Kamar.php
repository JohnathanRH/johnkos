<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'facilities',
        'floor',
        'price',
        'width',
        'length'
    ];

    public function kost(){
        return $this->belongsTo(Kost::class);
    }

    public function occupancy(){
        return $this->hasOne(Occupancy::class);
    }

    protected function casts(): array
    {
        return [
            'facilities' => 'array',
        ];
    }
}
