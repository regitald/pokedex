<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryBuilderTrait;
use App\Models\Category;
use App\Models\Specifications;
use App\Models\Power;
use App\Models\UserMonster;
use App\Models\Type;

class Monster extends Model
{
    use HasFactory, SoftDeletes, QueryBuilderTrait;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    protected $hidden = ['deleted_at','pivot'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'monster_categories', 'monster_id', 'category_id')->select('categories.id','categories.name');
    }

    public function powers()
    {
        return $this->belongsToMany(Power::class, 'monster_powers', 'monster_id', 'power_id')->select('powers.id','powers.name');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'monster_types', 'monster_id', 'type_id')->select('types.id','types.name');
    }

    public function users()
    {
        return $this->hasMany(UserMonster::class,'monster_id','id');
    }

    public function specifications()
    {
        return $this->belongsToMany(Specifications::class, 'monster_specifications', 'monster_id', 'specification_id')
                ->select('specifications.id','specifications.name','specifications.variant','monster_specifications.value');
    }
}
