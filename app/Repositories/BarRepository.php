<?php

namespace App\Repositories;

use App\Models\Bar;
use App\Repositories\Interfaces\IBarRepository;

class BarRepository extends BaseRepository implements IBarRepository
{
    public function __construct(Bar $bar)
    {
        parent::__construct($bar);
    }

    public function getAllBarsByUserId(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->get();
    }
}
