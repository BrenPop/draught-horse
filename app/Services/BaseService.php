<?php

namespace App\Services;

use App\Repositories\Interfaces\IBaseRepository;
use App\Services\Interfaces\IBaseService;

class BaseService implements IBaseService
{
    /**
     * @var IBaseRepository
     */
    protected $repository;

    /**
     * BaseService constructor.
     * 
     * @param IBaseRepository $baseRepository
     */
    public function __construct(IBaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
