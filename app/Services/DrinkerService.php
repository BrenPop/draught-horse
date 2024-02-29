<?php

namespace App\Services;

use App\Repositories\DrinkerRepositroy;
use App\Services\Interfaces\IDrinkerService;

class DrinkerService extends BaseService implements IDrinkerService
{
    public function __construct(DrinkerRepositroy $drinkerRepository)
    {
        parent::__construct($drinkerRepository);
    }
}
