<?php

namespace App\Repositories\Users\Eloquent;

use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Repositories\AbstractRepository;
use App\Models\User;

class UsersRepository extends AbstractRepository implements UsersRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}