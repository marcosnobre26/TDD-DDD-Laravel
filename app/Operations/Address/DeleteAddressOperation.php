<?php

namespace App\Operations\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DeleteAddressOperation
{
    public function handle(AddressRepositoryInterface $repository, int $id) : bool
    {
        return $repository->delete($id);
    }
}