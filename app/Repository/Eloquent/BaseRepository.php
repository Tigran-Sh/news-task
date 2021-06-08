<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * All repositories should be extends BaseRepository and implement each self interface
 *
 * Class BaseRepository
 * @package App\Repository\Eloquent
 */
class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Property model instance of Eloquent Model object
     *
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create data
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }
}
