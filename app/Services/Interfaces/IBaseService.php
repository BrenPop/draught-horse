<?php

namespace App\Services\Interfaces;

interface IBaseService
{
    public function getAll();

    public function findById($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
