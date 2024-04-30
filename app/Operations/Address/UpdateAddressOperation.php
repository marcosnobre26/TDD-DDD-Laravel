<?php

namespace App\Operations\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UpdateAddressOperation
{
    public function handle(AddressRepositoryInterface $repository, int $id, array $data): bool
    {
        return $repository->update($id, $data);
    }
}