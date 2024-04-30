<?php

namespace App\UseCase\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Operations\Address\GetAddressOperation;

class GetAllAddressUseCase
{
    private $address_repository;
    private $get_all_address_operation;
    public function __construct(
        AddressRepositoryInterface $address_repository,
        GetAddressOperation $get_all_address_operation,
    ) {
        $this->address_repository = $address_repository;
        $this->get_all_address_operation = $get_all_address_operation;
    }

    public function handle(
        array $filter_params
    ) : Collection
    {
        return $this->get_all_address_operation->handle($this->address_repository, $filter_params);
    }
}