<?php

namespace App\Services;

use App\Repositories\Interfaces\IBarRepository;
use App\Services\Interfaces\IBarService;

class BarService extends IBarService
{
    public function __construct(IBarRepository $iBarRepository)
    {
        parent::__construct($iBarRepository);
    }
}
