<?php

namespace App\Models;

use App\Models\CheckTableItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpTableType extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_up_table_types';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
    */

    protected $fillable = [
        'check_up_table_id',
        'check_up_type_id',
        'check_up_group_id',
    ];

    public function checkTableItems()
    {
        return $this->hasMany(CheckTableItem::class);
    }

    public function getItemName($id)
    {
        // $this->
    }
}
