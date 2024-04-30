<?php

namespace App\Operations\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;


class GetAddressByIdOperation
{
    public function handle(AddressRepositoryInterface $repository, int $id): ?Model
    {
        try {
            return $repository->getById($id);
        } catch (Exception $e) {
            return null;
        }
    }
}