<?php

namespace App\Services;

use App\Repositories\Interfaces\IBaseRepository;
use App\Services\Interfaces\IBaseService;

class BaseService implements IBaseService
{
    /**
     * @var IBaseRepository
     */
    protected $baseRepository;

    /**
     * BaseService constructor.
     * 
     * @param IBaseRepository $baseRepository
     */
    public function __construct(IBaseRepository $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->baseRepository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->baseRepository->findById($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->baseRepository->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return $this->baseRepository->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->baseRepository->delete($id);
    }
}
