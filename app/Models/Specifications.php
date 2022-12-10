<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryBuilderTrait;
use App\Models\MonsterSpecifications;

class Specifications extends Model
{
    use HasFactory, SoftDeletes, QueryBuilderTrait;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'variant'
    ];
    protected $hidden = ['deleted_at','pivot'];

    public function monsters()
    {
        return $this->hasMany(MonsterSpecifications::class, 'specification_id', 'id');
    }
}
