<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Monster;

class UserMonster extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'monster_id'
    ];

    public function monsters()
    {
        return $this->hasMany(Monster::class,'id','monster_id');
    }
}
