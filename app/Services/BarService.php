<?php

namespace App\Services;

use App\Repositories\BarRepository;
use App\Services\Interfaces\IBarService;

class BarService extends BaseService implements IBarService
{
    public function __construct(BarRepository $barRepository)
    {
        parent::__construct($barRepository);
    }
}
