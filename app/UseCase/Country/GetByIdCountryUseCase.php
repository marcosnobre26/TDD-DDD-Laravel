<?php

namespace App\UseCase\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Operations\Country\GetCountryByIdOperation;
use Illuminate\Database\Eloquent\Model;

class GetByIdCountryUseCase
{
    private $country_repository_interface;
    private $get_country_by_id_operation;
    public function __construct(
        CountryRepositoryInterface $country_repository_interface,
        GetCountryByIdOperation $get_country_by_id_operation,
    ) {
        $this->country_repository_interface = $country_repository_interface;
        $this->get_country_by_id_operation = $get_country_by_id_operation;
    }

    public function handle(
        int $id
    ) : Model|null
    {
        return $this->get_country_by_id_operation->handle($this->country_repository_interface, $id);
    }
}