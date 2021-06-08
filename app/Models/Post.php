<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    /**
     * Get post with categories
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
