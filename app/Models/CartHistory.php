<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHistory extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "product_id", "product_price", "quantity"];

    function productBelongsTo()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
