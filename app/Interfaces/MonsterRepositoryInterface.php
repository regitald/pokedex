<?php

namespace App\Interfaces;

interface MonsterRepositoryInterface
{
    public function fetch($request);
    public function store(array $data);
    public function marks($id, $user_id);
    public function show($id);
    public function update($id, array $data);
    public function destroy($id);
}
