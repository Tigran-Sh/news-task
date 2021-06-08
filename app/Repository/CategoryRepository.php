<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Category;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all categories
     *
     * @return Collection|Model[]
     */
    public function getAllCategories(): Collection
    {
        return $this->model->all();
    }
}
