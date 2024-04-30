<?php

namespace App\Operations\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Exception;

class GetCountryOperation
{
    public function handle(CountryRepositoryInterface $repository, array $filter_params): Collection
    {
        try {
            return $repository->get($filter_params);
        } catch (Exception $e) {
            return false;
        }
    }
}