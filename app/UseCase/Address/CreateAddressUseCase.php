<?php

namespace App\UseCase\Address;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\CreateAddressOperation;
use App\DataTransferObject\Address\AddressDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CreateAddressUseCase
{
    private $get_user_operation;
    private $user;
    private $address_repository;
    private $create_address_operation;
    public function __construct(
        AddressRepositoryInterface $address_repository,
        GetUserOperation $get_user_operation,
        UsersRepositoryInterface $user,
        CreateAddressOperation $create_address_operation,
    ) {
        $this->address_repository = $address_repository;
        $this->get_user_operation = $get_user_operation;
        $this->user = $user; // Remova o $ antes de user
        $this->create_address_operation = $create_address_operation;
    }

    public function handle(
        array $requestData,
    ) : Model|bool
    {
        $addressDTO = new AddressDTO(new Request($requestData));
        
        $filters = [
            'id' => $addressDTO->user_id,
        ];
        
        $list = $this->get_user_operation->handle($this->user, $filters);

        if ($list->count() || is_null($list)) {
            // Nenhum usuário encontrado, então retornamos false
            return false;
        }
        
        $data = $addressDTO->getData();

        return $this->create_address_operation->handle($this->address_repository, $data);
    }
}