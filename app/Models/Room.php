<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_used',
        'pic_url',
        'price'
    ];

    public function place() {
        return this -> belongsTo(Room::class);
    }

}
