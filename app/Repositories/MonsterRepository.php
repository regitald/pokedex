<?php
namespace App\Repositories;

use App\Interfaces\MonsterRepositoryInterface;
use App\Models\Monster;
use App\Models\MonsterSpecifications;
use App\Models\UserMonster;
use Illuminate\Support\Arr;

class MonsterRepository implements MonsterRepositoryInterface{
    protected $monster, $monster_specification, $user_monster;

    public function __construct(){
        $this->monster = new Monster();
        $this->monster_specification = new MonsterSpecifications();
        $this->user_monster = new UserMonster();
    }

    public function fetch($request){
        $query = $this->monster->with(['categories','types','users']);

        if($request['name']){
            $query->where('name', 'LIKE', '%'.$request['name'].'%');
        }

        if($request['types']){
			$query->WhereHas('types', function ($types) use ($request){
				$types->whereIn('types.id', $request['types']);
			});
		}

        if(!empty($request['order_by']) && !empty($request['sort_by'])){
            $query->orderBy($request['order_by'], $request['sort_by']);
        }

        if(!empty($request['catch']) && $request['catch'] == "true"){
			$query->WhereHas('users', function ($types) use ($request){
				$types->where('user_id', $request['user_id']);
			});
		}

        return $query->getOrPaginate($request->paginate, $request->per_page);
    }


    public function show($id){
        return $this->monster->with(['categories','powers','types','specifications','users'])->where('id',$id)->first();
    }

    public function store(array $data){
        $payload = [
            'name'          => $data['name'],
            'image'         => $data['image'],
            'description'   => $data['description']
        ];
        $monster = $this->monster->create($payload);
        $monster->categories()->attach($data['categories']);
        $monster->powers()->attach($data['powers']);
        $monster->types()->attach($data['types']);

        if(count($data['specifications'])>0){
            for ($i=0; $i < count($data['specifications']); $i++) {
                $specifications['monster_id'] = $monster->id;
                $specifications['specification_id'] = $data['specifications']['id'][$i];
                $specifications['value'] = $data['specifications']['value'][$i];
                $this->monster_specification->create($specifications);
            }
        }

        return $monster;
    }

    public function marks($id, $user_id){

        $payload['monster_id'] = $id;
        $payload['user_id'] = $user_id;
        $store = $this->user_monster->create($payload);

        return $store;
    }

    public function update($id, array $data){
        $payload = Arr::except($data, ['categories','types','powers','specifications']);
        $update = $this->monster->where('id',$id)->update($payload);

        $monster = $this->monster->where('id',$id)->first();
        if(!empty($data['categories']))  $monster->categories()->sync($data['categories']);
        if(!empty($data['powers']))  $monster->powers()->sync($data['powers']);
        if(!empty($data['types']))  $monster->types()->sync($data['types']);

        if(!empty($data['specifications'])){
             $this->monster_specification->where('monster_id',$id)->delete();
            for ($i=0; $i < count($data['specifications']); $i++) {
                $specifications['monster_id'] = $id;
                $specifications['specification_id'] = $data['specifications'][$i]['id'];
                $specifications['value'] = $data['specifications'][$i]['value'];
                $this->monster_specification->create($specifications);
            }
        }

        return $update;
    }

    public function destroy($id){
        return $this->monster->where('id',$id)->delete();
    }
}
