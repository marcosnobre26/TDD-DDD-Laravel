<?php

namespace App\UseCase\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\DeleteAddressOperation;
use App\Operations\Address\GetAddressByIdOperation;
use App\DataTransferObject\Address\AddressDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class DeleteAddressUseCase
{
    private $address_repository;
    private $delete_address_operation;
    private $get_address_by_id_operation;
    public function __construct(
        AddressRepositoryInterface $address_repository,
        DeleteAddressOperation $delete_address_operation,
        GetAddressByIdOperation $get_address_by_id_operation,
    ) {
        $this->address_repository = $address_repository;
        $this->delete_address_operation = $delete_address_operation;
        $this->get_address_by_id_operation = $get_address_by_id_operation;
    }

    public function handle(
        int $id,
    ) : bool
    {
        $address = $this->get_address_by_id_operation->handle($this->address_repository,$id);
        
        if (is_null($address)) {
            return false;
        }
        return $this->delete_address_operation->handle($this->address_repository, $id);
    }
}