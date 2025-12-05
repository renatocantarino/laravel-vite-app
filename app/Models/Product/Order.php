<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'cart_id', 'full_name',
        'address', 'city',
        'state', 'zipcode',
        'email', 'phone_number', 
        'notes', 'status'
    ];

    public $timestamps = true;


     public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}