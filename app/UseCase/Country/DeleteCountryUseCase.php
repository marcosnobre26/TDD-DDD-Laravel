<?php

namespace App\UseCase\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Operations\Country\DeleteCountryOperation;
use App\Operations\Country\GetCountryByIdOperation;

class DeleteCountryUseCase
{
    private $country_repository_interface;
    private $delete_country_operation;
    private $get_country_by_id_operation;
    public function __construct(
        CountryRepositoryInterface $country_repository_interface,
        DeleteCountryOperation $delete_country_operation,
        GetCountryByIdOperation $get_country_by_id_operation
    ) {
        $this->country_repository_interface = $country_repository_interface;
        $this->delete_country_operation = $delete_country_operation;
        $this->get_country_by_id_operation = $get_country_by_id_operation;
    }

    public function handle(
        int $id,
    ) : bool
    {
        $country = $this->get_country_by_id_operation->handle($this->country_repository_interface, $id);
        
        if (is_null($country)) {
            return false;
        }
        
        return $this->delete_country_operation->handle($this->country_repository_interface, $id);
    }
}