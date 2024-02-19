<?php

namespace App\Admin\Http\Controllers\Blog\Tag;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Tag\TagRepositoryInterface;
use App\Admin\Http\Resources\Tag\TagSearchSelectResource;

class TagSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        TagRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => TagSearchSelectResource::collection($this->instance)
        ];
    }
}