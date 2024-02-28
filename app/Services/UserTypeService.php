<?php

namespace App\Services;

use App\Repositories\UserTypeRepository;
use App\Services\Interfaces\IUserTypeService;
use Database\Seeders\UserTypeSeeder;

class UserTypeService extends BaseService implements IUserTypeService
{
    public function __construct(UserTypeRepository $userTypeRepository)
    {
        parent::__construct($userTypeRepository);
    }

    public function getRegistrationUserTypes()
    {
        $userTypes = $this->repository->getAll();

        return $userTypes::where('slug', '!=', 'admin')->pluck('name', 'id');
    }
}
