<?php

namespace App\Models;

use App\Models\TableColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableTitle extends Model
{
    protected $table = 'table_titles';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'title_en', 
        'title_tc', 
        'title_sc', 
        'package_id', 
    ];

    public function tableColumns()
    {
        return $this->hasMany(TableColumn::class,'table_title_id');
    }
}
