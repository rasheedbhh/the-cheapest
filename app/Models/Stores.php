<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'manager_id',
        'profile_picture'
    ];

    public function manager(){
        return $this->hasOne(User::class,'id');
    }

    public function products(){
        return $this->hasMany(Products::class,'store_id');    
    }
}
