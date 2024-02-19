<?php

namespace App\Repositories\Setting;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface SettingRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAll();

    public function getValueByKey($key);
}