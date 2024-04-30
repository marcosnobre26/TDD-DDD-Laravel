<?php

namespace App\Operations\Users;

use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;

class CreateUsersOperation
{
    public function handle(UsersRepositoryInterface $repository, array $data): Model|bool
    {
        try {
            return $repository->create($data);
        } catch (Exception $e) {
            return false;
        }
    }
}