<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function store(){
        return $this->belongsTo(Stores::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', '%' . $search . "%");
    }
    
}
