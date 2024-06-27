<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFavourite extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_favourite';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'customer_id', 
        'product_id',
    ];

}
