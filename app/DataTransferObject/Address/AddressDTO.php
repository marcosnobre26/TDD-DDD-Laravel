<?php

namespace App\DataTransferObject\Address;

use Illuminate\Http\Request;

class AddressDTO
{
    public string $name;
    public int $user_id;
    public int $country_id;
    public string $address_1;
    public string $city;
    public string $postal_code;
    public int $default;

    public function __construct(Request $request) {
        // realizar validação
        $this->user_id = $request->user_id;
        $this->name = $request->name;
        $this->country_id = $request->country_id;
        $this->address_1 = $request->address_1;
        $this->city = $request->city;
        $this->postal_code = $request->postal_code;
        $this->default = $request->default;

        return $this;
    }
 
    public function getName() : string
    {
        return $this->name;
    }

    public function getUserID() : string
    {
        return $this->user_id;
    }

    public function getCountryID() : string
    {
        return $this->country_id;
    }

    public function getAddress() : string
    {
        return $this->address_1;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function getPostalCode() : string
    {
        return $this->postal_code;
    }

    public function getDefault() : string
    {
        return $this->default;
    }

    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'name' => $this->name,
            'address_1' => $this->address_1,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'default' => $this->default,
        ];
    }
}