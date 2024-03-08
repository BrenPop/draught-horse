<?php

namespace App\Services\Interfaces;

interface IBarService extends IBaseService
{
    public function getUserBars();

    public function updateBarProfileCompletionPercentage(int $barId);

    public function getBarProfileCompletionPercentage(int $barId);
}
