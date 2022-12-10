<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryBuilderTrait;
use App\Models\Monster;

class Category extends Model
{
    use HasFactory, SoftDeletes, QueryBuilderTrait;
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];
    protected $hidden = ['deleted_at','pivot'];

    public function monsters()
    {
        return $this->belongsToMany(Monster::class, 'monster_categories', 'category_id', 'monster_id');
    }
}
