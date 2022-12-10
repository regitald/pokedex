<?php

namespace App\Http\Controllers;

use App\Services\TypeService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class TypeController extends Controller
{
    use GeneralTrait;
    protected $type_service;
    public function __construct(TypeService $type_service)
    {
        $this->type_service = $type_service;
    }

    public function index(Request $request)
    {
        $data = $this->type_service->fetch($request);

        return $this->ResponseJson(200,"Type Data",$data);
    }

    public function show($id)
    {
        $data = $this->type_service->show($id);

        if(!$data) {
            return $this->ResponseJson(404,"Type Not Found");
        }

        return $this->ResponseJson(200,"Type Detail",$data);

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

        $data = $this->type_service->store($request);

        return $this->ResponseJson(201,"Type Created",$data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->type_service->update($request, $id);

        if(!$data){
            return $this->ResponseJson(400,"Fail update Type!");
        }

        return $this->ResponseJson(200,"Type Updated");
    }

    public function destroy($id)
    {
        $data = $this->type_service->destroy($id);

        if(!$data){
            return $this->ResponseJson(400,"Fail to delete Type!");
        }

        return $this->ResponseJson(200,"Type Deleted");
    }

}
