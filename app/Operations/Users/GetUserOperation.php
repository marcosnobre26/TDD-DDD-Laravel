<?php

namespace App\Operations\Users;

use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\DataTransferObject\Users\AddressDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetUserOperation
{
    public function handle(UsersRepositoryInterface $repository, array $filter_params): Collection
    {
        return $repository->get($filter_params);
    }
}