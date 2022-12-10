<?php
namespace App\Repositories;

use App\Interfaces\TypeRepositoryInterface;
use App\Models\Type;

class TypeRepository implements TypeRepositoryInterface{
    protected $type;

    public function __construct(){
        $this->type = new Type();
    }

    public function fetch($request){
        return $this->type->getOrPaginate($request->paginate, $request->per_page);
    }


    public function show($id){
        return $this->type->where('id',$id)->first();
    }

    public function store(array $data){
        return $this->type->create($data);
    }

    public function update($id, array $data){
        return $this->type->where('id',$id)->update($data);
    }

    public function destroy($id){
        return $this->type->where('id',$id)->delete();
    }
}
