<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonsterCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'monster_id'
    ];

}
