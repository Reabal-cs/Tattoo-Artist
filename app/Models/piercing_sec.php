<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class piercing_sec extends Model
{
    protected $fillable = ['name', 'category','image', 'price'];
}
