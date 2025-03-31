<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_name', 'address', 'city', 'phone', 'email',
        'order_notes', 'product_id', 'product_name', 'product_desc',
        'product_price', 'quantity', 'total_price', 'payment_method','Ostatus'
    ];

    public function product()
    {
        return $this->belongsTo(products::class, 'product_id');
    }

    static function boot()
    {
        parent::boot();

        static::creating(function ($Order) {
            if (!$Order->tracking_number) {
                // Generate a unique tracking number
                $Order->tracking_number = strtoupper(Str::random(10));
            }
        });
    }




    }


