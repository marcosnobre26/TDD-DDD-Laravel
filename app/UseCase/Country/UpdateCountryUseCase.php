<?php

namespace App\UseCase\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Address\UpdateAddressOperation;
use App\Operations\Country\UpdateCountryOperation;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\GetAddressOperation;
use App\Operations\Address\GetAddressByIdOperation;
use App\Operations\Country\GetCountryByIdOperation;
use App\DataTransferObject\Address\AddressDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class UpdateCountryUseCase
{
    private $country_repository_interface;
    private $update_country_operation;
    private $get_country_by_id_operation;
    public function __construct(
        CountryRepositoryInterface $country_repository_interface,
        GetCountryByIdOperation $get_country_by_id_operation,
        UpdateCountryOperation $update_country_operation,
    ) {
        $this->country_repository_interface = $country_repository_interface;
        $this->update_country_operation = $update_country_operation;
        $this->get_country_by_id_operation = $get_country_by_id_operation;
    }

    public function handle(
        int $id,
        array $requestData,
    ) : Model|bool
    {
        $address = $this->get_country_by_id_operation->handle($this->country_repository_interface, $id);
        
        if (!$address) {
            return false;
        }

        return $this->update_country_operation->handle($this->country_repository_interface, $id, $requestData);
    }
}