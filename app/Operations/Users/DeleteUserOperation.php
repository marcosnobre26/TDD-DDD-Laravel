<?php

namespace App\Operations\Users;

use App\Repositories\Users\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DeleteUserOperation
{
    public function handle(UsersRepositoryInterface $repository, int $id) : bool
    {
        return $repository->delete($id);
    }
}
