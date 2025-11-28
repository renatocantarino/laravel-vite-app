<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    /**
     * @var mixed|string
     */
    public mixed $cart_id;
    protected $table = 'cart';
    protected $fillable = [
        'cart_id',
        'name',
        'image',
        'price',
        'qty',
        'prod_id',
        'user_id',
        'subtotal'
    ];



    protected $primaryKey = 'cart_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
