<?php

namespace App\Repository;

use App\Models\Post;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class PostRepository
 * @package App\Repository
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all news order by created at
     *
     * @param null $search
     * @return Collection
     */
    public function all($search = null): Collection
    {
        $query = $this->model->query();
        if ($search) {
            return $query->with('categories')
                ->whereHas('categories', function ($query) use ($search) {
                    $query->where('category_id', $search);
                })->get();
        }
        return $query->latest()->get();
    }

    /**
     * Create new post and save attached categories
     *
     * @param array $data
     */
    public function createNewPost(array $data)
    {
        DB::transaction(function () use ($data) {
            try {
                $post = $this->model->create($data);

                $post->categories()->attach($data['category_ids']);
            } catch (\Throwable $exception) {
                DB::rollBack();
            }
        });
    }


    /**
     * Find post by slug for single page
     *
     * @param string $slug
     * @return Model|null
     */
    public function findPostBySlug(string $slug): ?Model
    {
        return $this->model->whereSlug($slug)->first();
    }

    /**
     * Delete post
     *
     * @param $id
     * @return mixed
     */
    public function deletePost($id)
    {
        return $this->model
            ->find($id)
            ->delete();
    }

    /**
     * Get posts with categories
     *
     * @param int $id
     * @return Builder|Model|object|null
     */
    public function getPostWithPivot(int $id)
    {
        return $this->model
            ->with('categories')
            ->where('id', $id)
            ->first();
    }

    /**
     * Update post
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function updatePost(array $data, int $id)
    {
        DB::transaction(function () use ($data, $id) {
            try {
                $post = $this->getPostWithPivot($id);
                $post->categories()->sync($data['category_ids']);
                unset($data['category_ids']);
                $post->update($data);
                generate_slug($post);
            } catch (\Throwable $exception) {
                DB::rollback();
            }
        });
    }
}
