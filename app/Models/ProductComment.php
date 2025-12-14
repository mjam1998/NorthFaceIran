<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'comment',
        'admin_response',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
