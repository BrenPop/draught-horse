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

    public function getBarTypesForDropdown()
    {
        $barTypes = $this->repository->getBarTypes();
        $barTypes = [
            0 => "Select Bar Type",
        ] + $barTypes;

        return $barTypes;
    }
}
