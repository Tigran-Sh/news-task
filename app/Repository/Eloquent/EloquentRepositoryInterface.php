<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * You should be realize all method described in this interface
 *
 * Interface EloquentRepositoryInterface
 * @package App\Repository
 */
interface EloquentRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;
}
