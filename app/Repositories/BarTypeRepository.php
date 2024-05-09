<?php

namespace App\Repositories;

use App\Models\BarType;
use App\Repositories\Interfaces\IBarTypeRepository;

class BarTypeRepository extends BaseRepository implements IBarTypeRepository
{
    public function __construct(BarType $barType)
    {
        parent::__construct($barType);
    }

    public function getBarTypes()
    {
        return $this->model->all()->pluck('name', 'id')->toArray();
    }
}
