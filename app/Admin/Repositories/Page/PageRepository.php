<?php

namespace App\Admin\Repositories\Page;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Page\PageRepositoryInterface;
use App\Models\Page;

class PageRepository extends EloquentRepository implements PageRepositoryInterface
{
    public function getModel(){
        return Page::class;
    }
}