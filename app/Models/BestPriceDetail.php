<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestPriceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'best_price_title_en', 'best_price_title_tc', 'best_price_title_sc', 
        'best_price_text_en', 'best_price_text_tc', 'best_price_text_sc', 
        'best_price_description_en', 'best_price_description_tc', 'best_price_description_sc', 
        'best_price_img', 
   ];
}
