<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AbstractRepository implements BaseRepositoryInterface
{
    protected Model $model;

    /**
     * Constructor do Base Repository;
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Insere os dados da entidade com os dados informados.
     * @param array $data
     * @return Model|null
     * @throws Exception
     */
    public function create(array $data): ?Model
    {
        $model = $this->model->create($data);

        return $model->fresh();
    }

    /**
     * Salva os dados da entidade com os dados informados.
     */
    public function save(Model $model): bool
    {
        return $model->save();
    }

    /**
     * Atualiza os dados da entidade com os dados informados.
     * @param string|int $model_id
     * @param array $data
     * @return bool
     */
    public function update(string|int $model_id, array $data): bool
    {
        return $this->model->where('id', $model_id)->update($data);
    }


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
    ): ?Model
    {
        return $this->model->select($columns)
            ->with($relations)
            ->findOrFail($id)
            ->append($appends);
    }

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
    ): Collection
    {
        $query = $this->model->query();

        foreach ($filters as $column => $value) {
            $query->where($column, $value);
        }

        return $query->with($relations)->get($columns)->append($appends);
    }


    /**
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Collection
     */
    public function getOrWhere(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): Collection
    {
        $query = $this->model->query();
        foreach ($filters as $column => $value) {
            $query->orWhere($column, $value);
        }

        return $query->with($relations)->get($columns)->append($appends);
    }


    /**
     * Lista todos os registros
     * @param array $columns
     * @param array $relations
     * @return Collection     *
     */
    public function getAll(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }


    /**
     * Remove o registro pelo ID informado
     * @param string|int $id
     * @return bool
     */
    public function delete(string|int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * Lista todos os registros paginados
     * @param array $columns
     * @param array $relations
     * @return Collection     *
     */

    public function getAllPaginate(
        string $user_id,
        array $columns = ['*'],
        array $relations = [],
        int $perPage,
        int $pageNumber,
    ) : LengthAwarePaginator
    {
        return $this->model->with($relations)->where('user_id', $user_id)->paginate($perPage, $columns, 'page', $pageNumber);
    }

    /**
     * @inheritDoc
     */
    public function findWhereLike(array $searchColumns, string $search, string $column = 'id', string $order = 'ASC'): Collection
    {
        $query = $this->model->query();
        
        foreach ($searchColumns as $column => $value) {
            $query->orWhere($column, 'like', "%$value%");
        }
        
        return $query->orderBy($column, $order)->get();
    }

    /**
     * Lista todos os registros paginados.
     *
     * @param int $perPage
     * @param int $pageNumber
     * @param array $columns
     * @param array $relations
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage, int $pageNumber, array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->model->with($relations)->paginate($perPage, $columns, 'page', $pageNumber);
    }

}
