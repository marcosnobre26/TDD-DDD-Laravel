<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{
    /** @var \App\Models\Role */
    protected $model = Role::class;

    /** 
     * @param array $data Dados a serem criados.
     * @return Bool Registro criado.
     */
    public function create(array $data): Bool
    {
        $register = $this->model->create($data);
        return (bool) $register;
    }

    /** 
     * @param array $data Dados a serem atualizados.
     * @param int $id ID do registro.
     * @return Bool Registro atualizado.
     */
    public function update(array $data, int $id): Bool
    {
        $register = $this->find($id);
        
        if ($register) {

            $permissions = $register->permissions; 

            if (count($permissions)) {

                foreach ($permissions as $key => $value) {
                    $register->permissions()->detach($value->id);
                }
            }

            if (isset($data['permissions']) && count($data['permissions'])) {

                foreach ($data['permissions'] as $key => $value) {
                    $register->permissions()->attach($value);
                }
            }

            return (bool) $register->update($data);
        }
        
        return false;
    }
}
