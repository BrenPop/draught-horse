<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
