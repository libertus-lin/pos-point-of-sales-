<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        "user_id",
        'name',
        'email',
        'phone_number',
        'address',
        'address',
        'address_details',
        'city',
        'zip_code',
        'total_price',
        'status',
        'payment_image',
        'tracking_number'
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'order_id','id');
    }
}
