<?php

namespace App\Operations\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;

class CreateAddressOperation
{
    public function handle(AddressRepositoryInterface $repository, array $data): Model|bool
    {
        try {
            return $repository->create($data);
        } catch (Exception $e) {
            return false;
        }
    }
}