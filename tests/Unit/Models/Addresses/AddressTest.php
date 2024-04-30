<?php

namespace Tests\Unit\Models\Addresses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\UseCase\Address\CreateAddressUseCase;
use App\UseCase\Address\UpdateAddressUseCase;
use App\Operations\Address\DeleteAddressOperation;
use App\UseCase\Address\DeleteAddressUseCase;
use App\UseCase\Address\GetByIdAddressUseCase;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\GetAddressOperation;
use App\Operations\Address\GetAddressByIdOperation;
use App\Operations\Address\UpdateAddressOperation;
use App\Operations\Address\CreateAddressOperation;
use App\UseCase\Address\GetAllAddressUseCase;
use App\DataTransferObject\Address\AddressDTO;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Address;
use Tests\TestCase;
use Illuminate\Http\Request;

class AddressTest extends TestCase
{
    public function test_it_create_address()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do DeleteAddressOperation
        $get_user_operation = $this->createMock(GetUserOperation::class);
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

    public function test_it_not_creates_address_if_user_exists()
    {

        $numberOfItems = 5;
        // Crie uma instância de Collection com itens vazios
        $list = new Collection();
        for ($i = 0; $i < $numberOfItems; $i++) {
            $list->add(new User()); // Substitua YourModel pelo nome da sua classe de modelo
        }
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do DeleteAddressOperation
        $get_user_operation = $this->createMock(GetUserOperation::class);
        // Mock do GetAddressByIdOperation
        $users_repository_interface = $this->createMock(UsersRepositoryInterface::class);

        $create_address_operation = $this->createMock(CreateAddressOperation::class);

        // Configurando o mock para retornar uma instância de Address
        $get_user_operation->method('handle')->willReturn($list);
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
        $this->assertFalse($result);
    }

    public function test_it_deletes_address()
    {
        // Mock do AddressRepositoryInterface
        $addressRepository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do DeleteAddressOperation
        $deleteAddressOperation = $this->createMock(DeleteAddressOperation::class);
        // Mock do GetAddressByIdOperation
        $getAddressByIdOperation = $this->createMock(GetAddressByIdOperation::class);

        // Configurando o mock para retornar um objeto Address
        $getAddressByIdOperation->method('handle')->willReturn(new Address());

        // Configurando o mock para o método handle retornar true (indicando que a deleção foi bem-sucedida)
        $deleteAddressOperation->method('handle')->willReturn(true);

        // Instanciando o caso de uso
        $deleteAddressUseCase = new DeleteAddressUseCase(
            $addressRepository,
            $deleteAddressOperation,
            $getAddressByIdOperation
        );

        // Chamando o método handle do caso de uso
        $result = $deleteAddressUseCase->handle(1);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertTrue($result);
    }

    public function test_it_not_deletes_address_returns_false_if_address_not_found()
    {
        // Mock do AddressRepositoryInterface
        $addressRepository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do DeleteAddressOperation
        $deleteAddressOperation = $this->createMock(DeleteAddressOperation::class);
        // Mock do GetAddressByIdOperation
        $getAddressByIdOperation = $this->createMock(GetAddressByIdOperation::class);

        // Configurando o mock para retornar um objeto Address
        $getAddressByIdOperation->method('handle')->willReturn(null);

        // Configurando o mock para o método handle retornar true (indicando que a deleção foi bem-sucedida)
        $deleteAddressOperation->method('handle')->willReturn(false);

        // Instanciando o caso de uso
        $deleteAddressUseCase = new DeleteAddressUseCase(
            $addressRepository,
            $deleteAddressOperation,
            $getAddressByIdOperation
        );

        // Chamando o método handle do caso de uso
        $result = $deleteAddressUseCase->handle(1);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertFalse($result);
    }

    public function test_it_update_address_returns()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do UpdateAddressOperation
        $update_address_operation = $this->createMock(UpdateAddressOperation::class);
        // Mock do GetAddressByIdOperation
        $get_address_by_id_operation = $this->createMock(GetAddressByIdOperation::class);
        // Mock do UpdateAddressUseCase
        //$update_address_use_case = $this->createMock(UpdateAddressUseCase::class);

        // Configurando o mock para retornar um objeto Address
        $get_address_by_id_operation->method('handle')->willReturn(new Address());

        // Configurando o mock para o método handle retornar true (indicando que a alteração foi bem-sucedida)
        $update_address_operation->method('handle')->willReturn(true);

        $filters = [
            'name' => 'Rua 3',
            'address_1' => 'Rua 25'
        ];

        // Instanciando o caso de uso
        $update_address_use_case = new UpdateAddressUseCase(
            $address_repository,
            $get_address_by_id_operation,
            $update_address_operation
        );

        // Chamando o método handle do caso de uso
        $result = $update_address_use_case->handle(1, $filters);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertTrue($result);

    }

    public function test_it_not_update_address_returns_false_if_address_not_found()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do UpdateAddressOperation
        $update_address_operation = $this->createMock(UpdateAddressOperation::class);
        // Mock do GetAddressByIdOperation
        $get_address_by_id_operation = $this->createMock(GetAddressByIdOperation::class);

        // Configurando o mock para retornar um objeto Address
        $get_address_by_id_operation->method('handle')->willReturn(null);

        // Configurando o mock para o método handle retornar true (indicando que a alteração foi bem-sucedida)
        $update_address_operation->method('handle')->willReturn(false);

        $filters = [
            'name' => 'Rua 3',
            'address_1' => 'Rua 25'
        ];

        // Instanciando o caso de uso
        $update_address_use_case = new UpdateAddressUseCase(
            $address_repository,
            $get_address_by_id_operation,
            $update_address_operation
        );

        // Chamando o método handle do caso de uso
        $result = $update_address_use_case->handle(1, $filters);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertFalse($result);
    }

    public function test_it_get_by_id_address_returns()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do GetAddressByIdOperation
        $get_address_by_id_operation = $this->createMock(GetAddressByIdOperation::class);

        // Configurando o mock para retornar um objeto Address
        $get_address_by_id_operation->method('handle')->willReturn(new Address());

        // Instanciando o caso de uso
        $get_by_id_address_use_case = new GetByIdAddressUseCase(
            $address_repository,
            $get_address_by_id_operation
        );

        // Chamando o método handle do caso de uso
        $result = $get_by_id_address_use_case->handle(1);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertInstanceOf(Address::class, $result);
    }

    public function test_it_not_get_by_id_address_returns_false_if_address_not_found()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do GetAddressByIdOperation
        $get_address_by_id_operation = $this->createMock(GetAddressByIdOperation::class);

        // Configurando o mock para retornar um objeto Address
        $get_address_by_id_operation->method('handle')->willReturn(null);

        // Instanciando o caso de uso
        $get_by_id_address_use_case = new GetByIdAddressUseCase(
            $address_repository,
            $get_address_by_id_operation
        );

        // Chamando o método handle do caso de uso
        $result = $get_by_id_address_use_case->handle(1);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertEquals(null, $result);
    }

    public function test_it_get_all_address_returns()
    {
        // Mock do AddressRepositoryInterface
        $address_repository = $this->createMock(AddressRepositoryInterface::class);
        // Mock do GetAddressByIdOperation
        $get_all_address_operation = $this->createMock(GetAddressOperation::class);
        // Configurando o mock para retornar um objeto Address
        $get_all_address_operation->method('handle')->willReturn(new Collection());

        $filters = [
            'name' => 'Rua 3',
            'address_1' => 'Rua 25'
        ];
        // Instanciando o caso de uso
        $get_all_address_use_case = new GetAllAddressUseCase(
            $address_repository,
            $get_all_address_operation
        );

        // Chamando o método handle do caso de uso
        $result = $get_all_address_use_case->handle($filters);

        // Verificando se o resultado é true, indicando que a deleção foi bem-sucedida
        $this->assertInstanceOf(Collection::class, $result);
    }
}