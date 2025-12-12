<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'count',
        'price',
        'discount',
        'description',
        'material',
        'weight',
        'dimension',
        'meta_description',
        'page_title',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product_photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function product_sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function product_colores()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function product_comments()
    {
        return $this->hasMany(ProductComment::class);
    }
}
