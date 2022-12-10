<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specifications;
use App\Models\Monster;

class MonsterSpecifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'specification_id',
        'monster_id',
        'value'
    ];
    protected $hidden = ['pivot'];

    public function specification()
    {
        return $this->belongsTo(Specifications::class, 'specification_id', 'id');
    }

    public function monster()
    {
        return $this->belongsTo(Monster::class, 'monster_id', 'id');
    }
}
