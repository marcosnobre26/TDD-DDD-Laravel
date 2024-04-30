<?php

namespace App\Operations\Users;

use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;


class GetUserByIdOperation
{
    public function handle(UsersRepositoryInterface $repository, int $id): ?Model
    {
        try {
            return $repository->getById($id);
        } catch (Exception $e) {
            return null;
        }
    }
}
