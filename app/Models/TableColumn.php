<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableColumn extends Model
{
    protected $table = 'table_columns';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'col_name_en', 
        'col_name_tc', 
        'col_name_sc', 
        'package_id', 
        'table_title_id', 
    ];
}
