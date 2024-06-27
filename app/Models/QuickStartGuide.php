<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickStartGuide extends Model
{
    use HasFactory;
    protected $fillable = ['img','sort'];
}
