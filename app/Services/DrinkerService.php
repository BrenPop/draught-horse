<?php

namespace App\Services;

use App\Repositories\Interfaces\IDrinkerRepository;
use App\Services\Interfaces\IDrinkerService;

class DrinkerService extends BaseService implements IDrinkerService
{
    public function __construct(IDrinkerRepository $iDrinkerRepository)
    {
        parent::__construct($iDrinkerRepository);
    }
}
