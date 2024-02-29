<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }
}
