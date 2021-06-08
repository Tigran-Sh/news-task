<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface PostRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface PostRepositoryInterface
{
    /**
     * @param null $search
     * @return Collection
     */
    public function all($search = null): Collection;

    /**
     * @param string $slug
     * @return Model|null
     */
    public function findPostBySlug(string $slug): ?Model;

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updatePost(array $data, int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function createNewPost(array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function deletePost(int $id);
}
