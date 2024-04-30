<?php

namespace App\Operations\Country;

use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UpdateCountryOperation
{
    public function handle(CountryRepositoryInterface $repository, int $id, array $data): bool
    {
        return $repository->update($id, $data);
    }
}