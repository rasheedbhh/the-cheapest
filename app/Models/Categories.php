<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'image',
        'popular'
    ];
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    public function products(){
        return $this->hasMany(Products::class);    
    }

}
