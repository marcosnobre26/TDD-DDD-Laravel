<?php

namespace App\DataTransferObject\Country;

use Illuminate\Http\Request;

class CountryDTO
{
    public string $name;
    public string $code;

    public function __construct(Request $request) {
        // realizar validação
        $this->name = $request->name;
        $this->code = $request->code;

        return $this;
    }
 
    public function getName() : string
    {
        return $this->name;
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getData(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}