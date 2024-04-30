<?php

namespace App\Repositories\Address\Eloquent;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\AbstractRepository;
use App\Models\Address;

class AddressRepository extends AbstractRepository implements AddressRepositoryInterface
{
    public function __construct(Address $address)
    {
        $this->model = $address;
    }
}