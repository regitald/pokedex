<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonsterType extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'monster_id'
    ];
}
