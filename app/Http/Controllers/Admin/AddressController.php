<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Address\Contracts\AddressRepositoryInterface;
use App\Repositories\Users\Contracts\UsersRepositoryInterface;
use App\Operations\Users\GetUserOperation;
use App\Operations\Address\GetAddressByIdOperation;
use App\Operations\Address\GetAddressOperation;
use App\Operations\Address\UpdateAddressOperation;
use App\Operations\Address\DeleteAddressOperation;
use App\Operations\Address\CreateAddressOperation;
use App\UseCase\Address\CreateAddressUseCase;
use App\UseCase\Address\UpdateAddressUseCase;
use App\UseCase\Address\DeleteAddressUseCase;
use App\UseCase\Address\GetAllAddressUseCase;
use App\DataTransferObject\Address\AddressDTO;
//use App\Repositories\Contracts\PermissionRepositoryInterface;
use Validator;

class AddressController extends Controller
{    
    private $route = 'roles';
    private $paginate = 10;
    private $search = ['name','description'];
    private $model;
    private $user;
    private $createAddressUseCase;
    private $modelPermission;
    private $get_user_operation;
    private $get_address_operation;
    private $address;
    private $delete_address_use_case;
    private $delete_address_operation;
    private $get_address_by_id_operation;
    private $update_address_use_case;
    private $update_address_operation;
    private $get_all_address_use_case;
    private $create_address_use_case;
    private $create_address_operation;
    
    public function __construct(
        //AddressRepositoryInterface $model,
        AddressRepositoryInterface $address,
        UsersRepositoryInterface $user,
        GetUserOperation $get_user_operation,
        GetAddressOperation $get_address_operation,
        DeleteAddressUseCase $delete_address_use_case,
        DeleteAddressOperation $delete_address_operation,
        GetAddressByIdOperation $get_address_by_id_operation,
        GetAllAddressUseCase $get_all_address_use_case,
        UpdateAddressUseCase $update_address_use_case,
        UpdateAddressOperation $update_address_operation,
        CreateAddressUseCase $create_address_use_case,
        CreateAddressOperation $create_address_operation,
       // PermissionRepositoryInterface $modelPermission
    )
    {       
        //$this->model = $model;
        $this->user = $user;
        $this->get_user_operation = $get_user_operation;
        $this->get_address_operation = $get_address_operation;
        $this->address = $address;
        $this->delete_address_use_case = $delete_address_use_case;
        $this->delete_address_operation = $delete_address_operation;
        $this->get_address_by_id_operation = $get_address_by_id_operation;
        $this->update_address_use_case = $update_address_use_case;
        $this->update_address_operation = $update_address_operation;
        $this->get_all_address_use_case = $get_all_address_use_case;
        $this->create_address_use_case = $create_address_use_case;
        $this->create_address_operation = $create_address_operation;
        //$this->modelPermission = $modelPermission;
    }
    
    /**
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        /*$addressDTO = new AddressDTO($request);
        
        // Chama o use case CreateAddress para criar o endereço
        $createAddressUseCase = $this->createAddressUseCase->handle(
            $request->all()
        );
        return $createAddressUseCase;*/

        /*$filters = [
            'name' => 'Marcos Nobre',
            'email' => 'marcosnobre@example.net'
        ];*/

        $filters = [
            //'name' => 'Rua 3',
            //'address_1' => 'Rua 25'
        ];

        
        $requestData = [
            'user_id' => 1,
            'country_id' => 5,
            'name' => 'John Doe',
            'address_1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            'default' => 1,
        ];
        
        // Instanciando o caso de uso
        $create_address_use_case = new CreateAddressUseCase(
            $this->address,
            $this->get_user_operation,
            $this->user,
            $this->create_address_operation,
        );
        // Chamando o método handle do caso de uso
        $result = $create_address_use_case->handle($requestData);
        return $result;

        //$address_repository = new AddressRepositoryInterface();
        //$deleteAddressUseCase = new DeleteAddressUseCase($this->address, $this->delete_address_operation, $this->get_address_by_id_operation);
        //$allAddressUseCase = new GetAllAddressUseCase($this->address, $this->get_address_operation);
        //return $allAddressUseCase->handle(
        //    $filters
        //);

        //$users = $this->get_user_operation->handle($this->user, $filters);


        //$address = $this->get_address_operation->handle($this->address, $filters);

    }
}
