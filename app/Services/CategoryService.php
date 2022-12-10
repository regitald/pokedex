<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $category_repo;
    public function __construct(CategoryRepositoryInterface $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    public function fetch($request)
    {
        return $this->category_repo->fetch($request);

    }
    public function show($id)
    {
        return $this->category_repo->show($id);
    }

    public function store($request)
    {

        $data = [
            'name'      => $request['name']
        ];

        return $this->category_repo->store($data);
    }


    public function update($request, $id)
    {
        $data = [
            'name'  => $request['name']
        ];

        return $this->category_repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->category_repo->destroy($id);
    }

}
