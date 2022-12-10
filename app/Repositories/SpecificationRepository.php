<?php
namespace App\Repositories;

use App\Interfaces\SpecificationRepositoryInterface;
use App\Models\Specifications;

class SpecificationRepository implements SpecificationRepositoryInterface{
    protected $specifications;

    public function __construct(){
        $this->specifications = new Specifications();
    }

    public function fetch($request){
        return $this->specifications->getOrPaginate($request->paginate, $request->per_page);
    }

    public function show($id){
        return $this->specifications->where('id',$id)->first();
    }

    public function store(array $data){
        return $this->specifications->create($data);
    }

    public function update($id, array $data){
        return $this->specifications->where('id',$id)->update($data);
    }

    public function destroy($id){
        return $this->specifications->where('id',$id)->delete();
    }
}
