<?php

namespace App\Operations\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DeleteCountryOperation
{
    public function handle(CountryRepositoryInterface $repository, int $id) : bool
    {
        return $repository->delete($id);
    }
}