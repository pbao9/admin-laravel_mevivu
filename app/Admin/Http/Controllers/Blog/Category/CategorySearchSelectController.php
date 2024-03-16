<?php

namespace App\Admin\Http\Controllers\Blog\Category;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Http\Resources\Category\CategorySearchSelectResource;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;


class CategorySearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        CategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    protected function selectResponse()
    {
        $this->instance = [
            'results' => CategorySearchSelectResource::collection($this->instance)
        ];
    }
}
