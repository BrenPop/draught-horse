<?php

namespace App\Services;

use App\Repositories\BarRepository;
use App\Services\Interfaces\IBarService;

class BarService extends BaseService implements IBarService
{
    public function __construct(BarRepository $barRepository)
    {
        $this->repository = $barRepository;
    }

    public function create(array $data)
    {
        $data['profile_completion_percentage'] = 0;

        return $this->repository->create($data);
    }

    public function getUserBars()
    {
        $user = request()->user();

        return $this->repository->getAllBarsByUserId($user->id);
    }

    public function updateBarProfileCompletionPercentage(int $barId)
    {
    }

    public function getBarProfileCompletionPercentage(int $barId)
    {
        return 0;
    }
}
