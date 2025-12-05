<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenerateGuid; 

class CartItem extends Model
{
    use HasFactory;
    use GenerateGuid;


    protected $table = 'cartItem';
    protected $fillable = [
        'cart_id',
        'name', 
        'image',
        'price',
        'qty', 
        'prod_id',
        'subtotal'
    ];

    protected $primaryKey = 'cart_item_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;


    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
