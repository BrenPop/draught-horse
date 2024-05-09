<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IBarService extends IBaseService
{
    public function createBar(Request $request);

    public function getUserBars();

    public function updateBarProfileCompletionPercentage(int $barId);

    public function getBarProfileCompletionPercentage(int $barId);
}
