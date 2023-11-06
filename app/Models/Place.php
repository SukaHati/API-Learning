<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'email',
        'address',
        'image_url',
        'website_url'
    ];

    public function reviews() {
        return $this -> hasMany(Review::class);
    }

    public function facilities() {
        return $this -> belongsToMany(Facility::class);
    }
}
