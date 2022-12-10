<?php

namespace App\Http\Controllers;

use App\Services\MonsterService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class MonsterController extends Controller
{
    protected $monster_service;
    use GeneralTrait;
    public function __construct(MonsterService $monster_service)
    {
        $this->monster_service = $monster_service;
    }

    public function index(Request $request)
    {
        $data = $this->monster_service->fetch($request);

        return $this->ResponseJson(200,"Monster Data",$data);
    }

    public function marks(Request $request, $id)
    {
        $data = $this->monster_service->marks($request, $id);

        return $this->ResponseJson(200,"Monster Marked!",$data);
    }


    public function show($id)
    {
        $data = $this->monster_service->show($id);

        if(!$data) {
            return $this->ResponseJson(404,"Monster Not Found");
        }

        return $this->ResponseJson(200,"Monster Detail",$data);

    }

    public function store(Request $request)
    {
        $rules = [
			'name'  => 'required|string|min:5',
			'image' => 'mimes:jpeg,jpg,png|required|max:10000',
			'categories' => 'required|array|min:1',
			'powers'   => 'required|array|min:1',
			'types'   => 'required|array|min:1',
			'specifications' => 'required',
		];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->ResponseJson(422,$validator->errors()->first());
        }
        $data = $this->monster_service->store($request);

        return $this->ResponseJson(201,"Monster Created",$data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->monster_service->update($request, $id);

        if(!$data){
            return $this->ResponseJson(400,"Fail update Monster!");
        }

        return $this->ResponseJson(200,"Monster Updated");
    }

    public function destroy($id)
    {
        $data = $this->monster_service->destroy($id);

        if(!$data){
            return $this->ResponseJson(400,"Fail to delete Monster!");
        }

        return $this->ResponseJson(200,"Monster Deleted");
    }

}
