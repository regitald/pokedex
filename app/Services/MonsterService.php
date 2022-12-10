<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\MonsterRepositoryInterface;
use App\Traits\GeneralTrait;

class MonsterService
{
    use GeneralTrait;
    protected $monster_repo;
    public function __construct(MonsterRepositoryInterface $monster_repo)
    {
        $this->monster_repo = $monster_repo;
    }

    public function fetch($request)
    {
        $token =  $request->bearerToken();

        if($token) $request['user_id'] = $this->decodeJwt($token)->sub;

        return $this->monster_repo->fetch($request);

    }
    public function show($id)
    {
        return $this->monster_repo->show($id);
    }

    public function marks($request, $id)
    {
        $token =  $request->bearerToken();

        $user_id = $this->decodeJwt($token)->sub;
        return $this->monster_repo->marks($id, $user_id);
    }

    public function store($request)
    {
        $image = uploadFile($request->image,"monsters");

        $data = [
            'name'          => $request['name'],
            'image'         => $image,
            'description'   => $request['description'],
            'categories'    => $request['categories'],
            'powers'        => $request['powers'],
            'types'         => $request['types'],
            'specifications' => $request['specifications'],
        ];

        return $this->monster_repo->store($data);
    }


    public function update($request, $id)
    {
        if ($request['image']) {
            $request['image'] = uploadFile($request['image'],"monsters");
        }
        return $this->monster_repo->update($id, $request->all());
    }

    public function destroy($id)
    {
        $data = $this->show($id);
        if($data){
            deleteFile($data->image,"monsters");
        }

        return $this->monster_repo->destroy($id);
    }

}
