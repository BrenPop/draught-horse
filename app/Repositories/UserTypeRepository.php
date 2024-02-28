<?php

namespace App\Repositories;

use App\Models\UserType;
use App\Repositories\Interfaces\IUserTypeRepository;

class UserTypeRepository extends BaseRepository implements IUserTypeRepository
{
    public function __construct(UserType $model)
    {
        parent::__construct($model);
    }
}
