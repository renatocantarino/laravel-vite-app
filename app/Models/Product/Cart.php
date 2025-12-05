<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenerateGuid; 

class Cart extends Model
{
    use HasFactory;
    use GenerateGuid;


    protected $table = 'cart';
    protected $fillable = [
         'user_id',
         'subtotal',
         'status'
    ];

    protected $primaryKey = 'cart_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;


    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function ordem()
    {
        return $this->hasOne(Order::class, 'cart_id');
    }
}
