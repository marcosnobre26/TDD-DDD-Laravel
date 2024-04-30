<?php

namespace App\UseCase\Address;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Operations\Country\GetCountryOperation;

class GetAllCountryUseCase
{
    private $country_repository_interface;
    private $get_all_country_operation;
    public function __construct(
        CountryRepositoryInterface $country_repository_interface,
        GetCountryOperation $get_all_country_operation,
    ) {
        $this->country_repository_interface = $country_repository_interface;
        $this->get_all_country_operation = $get_all_country_operation;
    }

    public function handle(
        array $filter_params
    ) : Collection
    {
        return $this->get_all_country_operation->handle($this->country_repository_interface, $filter_params);
    }
}