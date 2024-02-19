<?php

namespace App\Admin\Repositories\Tag;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface TagRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10);
}