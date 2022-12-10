<?php

namespace App\Http\Controllers;

use App\Services\PowerService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class PowerController extends Controller
{
    use GeneralTrait;
    protected $power_service;
    public function __construct(PowerService $power_service)
    {
        $this->power_service = $power_service;
    }

    public function index(Request $request)
    {
        $data = $this->power_service->fetch($request);

        return $this->ResponseJson(200,"Power Data",$data);
    }

    public function show($id)
    {
        $data = $this->power_service->show($id);

        if(!$data) {
            return $this->ResponseJson(404,"Power Not Found");
        }

        return $this->ResponseJson(200,"Power Detail",$data);

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

        $data = $this->power_service->store($request);

        return $this->ResponseJson(201,"Power Created",$data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->power_service->update($request, $id);

        if(!$data){
            return $this->ResponseJson(400,"Fail update Power!");
        }

        return $this->ResponseJson(200,"Power Updated");
    }

    public function destroy($id)
    {
        $data = $this->power_service->destroy($id);

        if(!$data){
            return $this->ResponseJson(400,"Fail to delete Power!");
        }

        return $this->ResponseJson(200,"Power Deleted");
    }

}
