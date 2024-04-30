<?php

namespace App\Operations\Users;

use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UpdateUserOperation
{
    public function handle(UsersRepositoryInterface $repository, int $id, array $data): bool
    {
        return $repository->update($id, $data);
    }
}
