<?php

namespace App\Operations\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Exception;

class CreateCountryOperation
{
    public function handle(CountryRepositoryInterface $repository, array $data): Model|bool
    {
        try {
            return $repository->create($data);
        } catch (Exception $e) {
            return false;
        }
    }
}