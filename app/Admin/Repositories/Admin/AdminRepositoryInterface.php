<?php

namespace App\Admin\Repositories\Admin;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface AdminRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($value = '', $meta = [], $limit = 10);
	public function getQueryBuilderFollowRole();
}