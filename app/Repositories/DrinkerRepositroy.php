<?php

namespace App\Repositories;

use App\Models\Drinker;
use App\Repositories\Interfaces\IDrinkerRepository;

class DrinkerRepositroy extends BaseRepository implements IDrinkerRepository
{
    public function __construct(Drinker $drinker)
    {
        parent::__construct($drinker);
    }
}
