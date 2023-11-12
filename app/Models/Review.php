<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'rating'
    ];

    public function place() {
        return $this -> belongsTo(Review::class);
    }

    public function user() {
        return $this -> belongsTo(User::class);
    }
}
