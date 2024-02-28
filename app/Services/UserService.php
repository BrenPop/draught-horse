<?php

namespace App\Services;

use App\Models\UserType;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IUserService;

class UserService extends BaseService implements IUserService
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function getRegistrationUserTypes()
    {
        return UserType::where('slug', '!=', 'admin')->pluck('name', 'id');
    }
}
