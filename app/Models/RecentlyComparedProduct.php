<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecentlyComparedProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recently_compared_product';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'customer_id', 
        'product_id',
    ];

}
