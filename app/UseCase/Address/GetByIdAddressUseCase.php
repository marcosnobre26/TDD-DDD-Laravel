<?php

namespace App\UseCase\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Operations\Address\GetAddressByIdOperation;
use Illuminate\Database\Eloquent\Model;

class GetByIdAddressUseCase
{
    private $address_repository;
    private $get_address_by_id_operation;
    public function __construct(
        AddressRepositoryInterface $address_repository,
        GetAddressByIdOperation $get_address_by_id_operation,
    ) {
        $this->address_repository = $address_repository;
        $this->get_address_by_id_operation = $get_address_by_id_operation;
    }

    public function handle(
        int $id
    ) : Model|null
    {
        return $this->get_address_by_id_operation->handle($this->address_repository, $id);
    }
}