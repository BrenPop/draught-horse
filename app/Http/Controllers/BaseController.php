<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\IBaseService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    public function __construct(IBaseService $service)
    {
        $this->service = $service;
    }
}
