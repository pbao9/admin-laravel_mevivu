<?php

namespace App\Admin\Repositories\User;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
	public function count();
	public function searchAllLimit($value = '', $meta = [], $limit = 10);
}