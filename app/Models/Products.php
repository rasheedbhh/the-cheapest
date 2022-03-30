<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantiy',
        'image',
        'store_id',
        'category_id',
        'discount_price',
        'brand',
        'on_sale',
        'trending',
        'main_slider',
        'mid_slider',
        'weight',
        'status',
        'subcategory_id'
    ];
    public function store(){
        return $this->belongsTo(Stores::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function manager(){
        return $this->belongsTo(User::class);
    }
  
    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', '%' . $search . "%");
    }
    
}
