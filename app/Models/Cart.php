<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carts';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'customer_id', 
        'product_id', 
        'package_id',
        'qty',
        'price',
        'image',
        'description',
    ];

    protected $appends = ['sub_total'];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getSubTotalAttribute()
    {
        return $this->price * $this->qty;
    }
}
