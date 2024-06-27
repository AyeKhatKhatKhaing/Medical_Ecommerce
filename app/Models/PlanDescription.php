<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDescription extends Model
{
    use HasFactory;

    protected $table = 'plan_descriptions';

    protected $primaryKey = 'id';

    protected $fillable = ['merchant_id', 'name_en', 'name_tc', 'name_sc', 'content_en', 'content_tc', 'content_sc'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
