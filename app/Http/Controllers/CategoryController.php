<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class CategoryController extends Controller
{
    use GeneralTrait;
    protected $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function index(Request $request)
    {
        $data = $this->category_service->fetch($request);

        return $this->ResponseJson(200,"Category Data",$data);
    }

    public function show($id)
    {
        $data = $this->category_service->show($id);

        if(!$data) {
            return $this->ResponseJson(404,"Category Not Found");
        }

        return $this->ResponseJson(200,"Category Detail",$data);

    }

    public function store(Request $request)
    {
        $rules = [
			'name'  => 'required|string|min:5'
		];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->ResponseJson(422,$validator->errors()->first());
        }

        $data = $this->category_service->store($request);

        return $this->ResponseJson(201,"Category Created",$data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->category_service->update($request, $id);

        if(!$data){
            return $this->ResponseJson(400,"Fail update Category!");
        }

        return $this->ResponseJson(200,"Category Updated");
    }

    public function destroy($id)
    {
        $data = $this->category_service->destroy($id);

        if(!$data){
            return $this->ResponseJson(400,"Fail to delete Category!");
        }

        return $this->ResponseJson(200,"Category Deleted");
    }

}
