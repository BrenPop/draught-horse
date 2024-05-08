<?php

namespace App\Services;

use App\Repositories\BarTypeRepository;
use App\Services\Interfaces\IBarTypeService;

class BarTypeService extends BaseService implements IBarTypeService
{
    public function __construct(BarTypeRepository $barTypeRepository)
    {
        parent::__construct($barTypeRepository);
    }

    public function getBarTypes()
    {
        return $this->repository->getBarTypes();
    }
}
