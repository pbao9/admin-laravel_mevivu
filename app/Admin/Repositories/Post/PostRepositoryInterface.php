<?php

namespace App\Admin\Repositories\Post;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Post;

interface PostRepositoryInterface extends EloquentRepositoryInterface
{
    public function updateMultipleBy(array $filter = [], array $data);
    public function attachCategories(Post $post, array $categoriesId);
    public function attachTag(Post $post, array $tagId);
    public function syncCategories(Post $post, array $categoriesId);
    public function syncTag(Post $post, array $tagId);
}