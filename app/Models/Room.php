<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user',
        'is_used'
    ]

    public function place() {
        return this -> belongsTo(Place::class);
    }
}
