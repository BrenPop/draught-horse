<?php

namespace App\Repositories\Interfaces;

interface IBarRepository extends IBaseRepository
{
    public function getAllBarsByUserId(int $userId);
}
