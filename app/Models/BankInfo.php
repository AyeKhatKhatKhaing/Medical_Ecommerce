<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
        [
            'bank_name_en',
            'bank_name_tc',
            'bank_name_sc',
            'logo', 
            'account_number', 
            'account_name'
        ];
}
