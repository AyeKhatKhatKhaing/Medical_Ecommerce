<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipHelp extends Model
{
    use HasFactory;
    protected $fillable = [
        'help_subtitle_en','help_subtitle_tc','help_subtitle_sc',
        'help_description_en','help_description_tc','help_description_sc',
    ];
}
