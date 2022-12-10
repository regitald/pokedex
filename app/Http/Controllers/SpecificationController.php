<?php

namespace App\Http\Controllers;

use App\Services\SpecificationService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class SpecificationController extends Controller
{
    use GeneralTrait;
    protected $specification_services;
    public function __construct(SpecificationService $specification_services)
    {
        $this->specification_services = $specification_services;
    }

    public function index(Request $request)
    {
        $data = $this->specification_services->fetch($request);

        return $this->ResponseJson(200,"Specification Data",$data);
    }

    public function show($id)
    {
        $data = $this->specification_services->show($id);

        if(!$data) {
            return $this->ResponseJson(404,"Specification Not Found");
        }

        return $this->ResponseJson(200,"Specification Detail",$data);

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

        $data = $this->specification_services->store($request);

        return $this->ResponseJson(201,"Specification Created",$data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->specification_services->update($request, $id);

        if(!$data){
            return $this->ResponseJson(400,"Fail update Specification!");
        }

        return $this->ResponseJson(200,"Specification Updated");
    }

    public function destroy($id)
    {
        $data = $this->specification_services->destroy($id);

        if(!$data){
            return $this->ResponseJson(400,"Fail to delete Specification!");
        }

        return $this->ResponseJson(200,"Specification Deleted");
    }

}
