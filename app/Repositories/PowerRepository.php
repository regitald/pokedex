<?php
namespace App\Repositories;

use App\Interfaces\PowerRepositoryInterface;
use App\Models\Power;

class PowerRepository implements PowerRepositoryInterface{
    protected $power;

    public function __construct(){
        $this->power = new Power();
    }

    public function fetch($request){
        return $this->power->getOrPaginate($request->paginate, $request->per_page);
    }

    public function show($id){
        return $this->power->where('id',$id)->first();
    }

    public function store(array $data){
        return $this->power->create($data);
    }

    public function update($id, array $data){
        return $this->power->where('id',$id)->update($data);
    }

    public function destroy($id){
        return $this->power->where('id',$id)->delete();
    }
}
