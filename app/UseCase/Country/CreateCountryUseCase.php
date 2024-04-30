<?php

namespace App\UseCase\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Operations\Country\CreateCountryOperation;
use App\DataTransferObject\Country\CountryDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CreateCountryUseCase
{
    private $country_repository_interface;
    private $create_country_operation;
    public function __construct(
        CountryRepositoryInterface $country_repository_interface,
        CreateCountryOperation $create_country_operation,
    ) {
        $this->country_repository_interface = $country_repository_interface;
        $this->create_country_operation = $create_country_operation;
    }

    public function handle(
        array $info,
    ) : Model|bool
    {
        $countryDTO = new CountryDTO(new Request($info));
        
        $data = $countryDTO->getData();

        return $this->create_country_operation->handle($this->country_repository_interface, $data);
    }
}