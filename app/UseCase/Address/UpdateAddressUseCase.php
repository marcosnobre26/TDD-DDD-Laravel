<?php

namespace App\UseCase\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Address\UpdateAddressOperation;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\GetAddressOperation;
use App\Operations\Address\GetAddressByIdOperation;
use App\DataTransferObject\Address\AddressDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class UpdateAddressUseCase
{
    private $address_repository;
    private $user_address_operation;
    private $get_address_by_id_operation;
    public function __construct(
        AddressRepositoryInterface $address_repository,
        GetAddressByIdOperation $get_address_by_id_operation,
        UpdateAddressOperation $user_address_operation,
    ) {
        $this->address_repository = $address_repository;
        $this->user_address_operation = $user_address_operation;
        $this->get_address_by_id_operation = $get_address_by_id_operation;
    }

    public function handle(
        int $id,
        array $requestData,
    ) : Model|bool
    {
        $address = $this->get_address_by_id_operation->handle($this->address_repository, $id);
        
        if (!$address) {
            return false;
        }

        return $this->user_address_operation->handle($this->address_repository, $id, $requestData);
    }
}