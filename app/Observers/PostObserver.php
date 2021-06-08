<?php

namespace App\Observers;

use App\Models\Post;
use function generate_slug;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        // generate_slug function check if exists slug in table add -id in the en of slug for unique
        generate_slug($post);
    }
}
