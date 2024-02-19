<?php

namespace App\Api\V1\Repositories\User;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByKey($key, $value);

    public function update($id, array $data);

    public function updateObject($user, $data);

}