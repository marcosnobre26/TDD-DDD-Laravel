<?php

namespace App\Operations\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Exception;

class GetAddressOperation
{
    public function handle(AddressRepositoryInterface $repository, array $filter_params): Collection
    {
        try {
            return $repository->get($filter_params);
        } catch (Exception $e) {
            return false;
        }
    }
}