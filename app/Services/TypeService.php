<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\TypeRepositoryInterface;

class TypeService
{
    protected $type_repo;
    public function __construct(TypeRepositoryInterface $type_repo)
    {
        $this->type_repo = $type_repo;
    }

    public function fetch($request)
    {
        return $this->type_repo->fetch($request);

    }
    public function show($id)
    {
        return $this->type_repo->show($id);
    }

    public function store($request)
    {

        $data = [
            'name' => $request['name']
        ];

        return $this->type_repo->store($data);
    }


    public function update($request, $id)
    {
        $data = [
            'name' => $request['name']
        ];

        return $this->type_repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->type_repo->destroy($id);
    }

}
