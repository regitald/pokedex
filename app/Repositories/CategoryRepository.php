<?php
namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface{
    protected $category;

    public function __construct(){
        $this->category = new Category();
    }

    public function fetch($request){
        return $this->category->getOrPaginate($request->paginate, $request->per_page);
    }


    public function show($id){
        return $this->category->where('id',$id)->first();
    }

    public function store(array $data){
        return $this->category->create($data);
    }

    public function update($id, array $data){
        return $this->category->where('id',$id)->update($data);
    }

    public function destroy($id){
        return $this->category->where('id',$id)->delete();
    }
}
