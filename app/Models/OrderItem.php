<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function order(){
        return $this->belongsTo(orders::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function vendor(){
        return $this->belongsTo(User::class,'vendor_id','id');
    }
}
