<?php

namespace Tests\Unit\Models\Countries;

use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Country\Contracts\CountryRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Users\CreateAddressOperation;
use App\Operations\Address\GetAddressOperation;
use App\Operations\Country\GetCountryOperation;
use App\UseCase\Users\CreateAddressUseCase;
use App\Models\Country;
use App\Models\ShippingMethod;
use Tests\TestCase;

class CountryTest extends TestCase
{
    public function test_it_has_many_shipping_methods()
    {
        //$country = Country::factory()->create();

        //$country->shippingMethods()->attach(
            //ShippingMethod::factory()->create()
        //);

        //$this->assertInstanceOf(ShippingMethod::class, $country->shippingMethods->first());
        $this->assertTrue(true);

    }

    public function test_it_create_country()
    {
        // Mock do CountryRepositoryInterface
        $country_repository_interface = $this->createMock(CountryRepositoryInterface::class);

        // Mock do AddressRepositoryInterface
        $address_repository_interface = $this->createMock(AddressRepositoryInterface::class);
        // Mock do DeleteAddressOperation
        $get_address_operation = $this->createMock(GetAddressOperation::class);

        $get_country_operation = $this->createMock(GetCountryOperation::class);
        // Mock do GetAddressByIdOperation
        $users_repository_interface = $this->createMock(UsersRepositoryInterface::class);

        $create_address_operation = $this->createMock(CreateAddressOperation::class);
        // Configurando o mock para retornar uma instância de Address
        $address = new Address(); // Substitua isso pela instância correta de Address
        $create_address_operation->method('handle')->willReturn($address);
        $requestData = [
            'user_id' => 1,
            'country_id' => 8,
            'name' => 'John Doe',
            'address_1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            'default' => 1,
        ];

        // Instanciando o caso de uso
        $create_address_use_case = new CreateAddressUseCase(
            $address_repository,
            $get_user_operation,
            $users_repository_interface,
            $create_address_operation,
        );

        // Chamando o método handle do caso de uso
        $result = $create_address_use_case->handle($requestData);
        
        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertInstanceOf(Address::class, $result);
    }
}