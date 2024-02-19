<?php

namespace App\Admin\Repositories\Tag;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Tag\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository extends EloquentRepository implements TagRepositoryInterface
{

    public function getModel(){
        return Tag::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10){

        $this->instance = $this->model->where('name', 'like', "%{$keySearch}%");
        
        $this->applyFilters($meta);

        return $this->instance->published()->limit($limit)->get();
    }
}