<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image', 'description', 'additional_info', 'category_id', 'subcategory_id'];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}