<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\PowerRepositoryInterface;

class PowerService
{
    protected $power_repo;
    public function __construct(PowerRepositoryInterface $power_repo)
    {
        $this->power_repo = $power_repo;
    }

    public function fetch($request)
    {
        return $this->power_repo->fetch($request);

    }
    public function show($id)
    {
        return $this->power_repo->show($id);
    }

    public function store($request)
    {

        $data = [
            'name' => $request['name']
        ];

        return $this->power_repo->store($data);
    }


    public function update($request, $id)
    {
        $data = [
            'name' => $request['name']
        ];

        return $this->power_repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->power_repo->destroy($id);
    }

}
