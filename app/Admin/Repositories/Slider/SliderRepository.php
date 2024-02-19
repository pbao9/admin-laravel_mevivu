<?php

namespace App\Admin\Repositories\Slider;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Slider\SliderRepositoryInterface;
use App\Models\Slider;

class SliderRepository extends EloquentRepository implements SliderRepositoryInterface
{

    public function getModel(){
        return Slider::class;
    }
}