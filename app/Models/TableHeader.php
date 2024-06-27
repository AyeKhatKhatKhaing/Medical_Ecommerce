<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableHeader extends Model
{
    protected $table = 'table_headers';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'header_en', 
        'header_tc', 
        'header_sc', 
        'package_id', 
    ];
    
}
