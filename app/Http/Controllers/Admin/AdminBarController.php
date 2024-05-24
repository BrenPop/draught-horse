<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\BarService;
use App\Services\UserService;

class AdminBarController extends BaseController
{
    public function __construct(
        protected BarService $service,
        protected UserService $userService
    ) {
        $this->service = $service;
    }

    public function index()
    {
        $dataCards = [];

        return view('admin.dashboard', compact('dataCards'));

        // Get number of active drinkers
        // Get number of new drinkers registered over the last 24 hours / 7 days / 1 Month
        // Get number of active bars
        // Get bars with pending status
    }
}
