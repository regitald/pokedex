<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\SpecificationRepositoryInterface;

class SpecificationService
{
    protected $specification_repo;
    public function __construct(SpecificationRepositoryInterface $specification_repo)
    {
        $this->specification_repo = $specification_repo;
    }

    public function fetch($request)
    {
        return $this->specification_repo->fetch($request);

    }
    public function show($id)
    {
        return $this->specification_repo->show($id);
    }

    public function store($request)
    {

        $data = [
            'name' => $request['name'],
            'variant' => $request['variant']
        ];

        return $this->specification_repo->store($data);
    }


    public function update($request, $id)
    {
        return $this->specification_repo->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->specification_repo->destroy($id);
    }

}
