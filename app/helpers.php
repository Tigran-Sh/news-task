<?php

use Illuminate\Support\Str;

if (!function_exists('generate_slug')) {
    function generate_slug($model)
    {
        $checkStatus = $model::whereSlug(Str::slug($model->title))->exists();
        $model->slug = $checkStatus ? Str::slug($model->title) . '-' . $model->id : Str::slug($model->title);
        $model->save();
    }
}


if (!function_exists('previous_route')) {
    /**
     * Generate a route name for the previous request.
     *
     * @return string|null
     */
    function previous_route(): ?string
    {
        $previousRequest = app('request')->create(app('url')->previous());

        try {
            $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
        } catch (\Throwable $exception) {
            return null;
        }

        return $routeName;
    }
}
