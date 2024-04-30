<?php

namespace App\Repositories\Country\Eloquent;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Repositories\AbstractRepository;
use App\Models\Country;

class CountryRepository extends AbstractRepository implements CountryRepositoryInterface
{
    public function __construct(Country $country)
    {
        $this->model = $country;
    }
}