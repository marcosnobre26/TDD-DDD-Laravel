<?php

namespace App\Repositories\Contracts;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface.
 */
interface BaseRepositoryInterface
{
    /**
     * Insere os dados da entidade com os dados informados.
     * @param array $data
     * @return Model|null
     * @throws Exception
     */
    public function create(array $data): ?Model;

    /**
     * Salva os dados da entidade com os dados informados.
     * @param Model $model
     * @return bool
     * @throws Exception
     */
    public function save(Model $model): bool;

    /**
     * Atualiza os dados da entidade com os dados informados.
     * @param string|int $model_id
     * @param array $data
     * @return bool
     */

    public function update(string|int $model_id, array $data): bool;

    /**
     * Lista os dados pelo id informado
     * @param string|int $id
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model|null
     * @throws Exception
     */
    public function getById(
        string|int $id,
        array      $columns = ['*'],
        array      $relations = [],
        array      $appends = []
    ): ?Model;

    /**
     * Lista os dados pelos filtros informados
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Collection
     */
    public function get(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): Collection;

    /**
     * Lista todos os registros
     * @param array $columns
     * @param array $relations
     * @return Collection     *
     */
    public function getAll(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Remove o registro pelo ID informado
     * @param string|int $id
     * @return bool
     */
    public function delete(string|int $id): bool;
}
