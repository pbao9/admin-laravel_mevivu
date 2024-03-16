<?php

namespace App\Admin\Repositories\Category;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function getFlatTreeNotInNode(array $nodeId);

    public function getFlatTree();
    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10);
}
