<?php

namespace App\Operations\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;


class GetCountryByIdOperation
{
    public function handle(CountryRepositoryInterface $repository, int $id): ?Model
    {
        try {
            return $repository->getById($id);
        } catch (Exception $e) {
            return null;
        }
    }
}