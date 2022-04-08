<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'quantiy',
        'user_id',
        'store_id',
        'product_id'
    ];
    public function product(){
        return $this->belongsTo(Products::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function store(){
        return $this->belongsTo(Stores::class);
    }

}
