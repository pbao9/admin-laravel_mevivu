<?php

namespace App\Admin\Repositories\Slider;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Slider\SliderItemRepositoryInterface;
use App\Models\SliderItem;

class SliderItemRepository extends EloquentRepository implements SliderItemRepositoryInterface
{

    public function getModel(){
        return SliderItem::class;
    }

    public function getQueryBuilderOrderBy($column = 'position', $sort = 'asc'){

        $this->getQueryBuilder();

        $this->instance = $this->instance->orderBy($column, $sort);

        return $this->instance;
    }
}