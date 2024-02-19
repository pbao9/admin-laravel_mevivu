<?php

namespace App\Admin\Repositories\User;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{

    public function getModel(){
        return User::class;
    }
    public function count(){
        return $this->model->count();
    }
    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10){

        $this->instance = $this->model;
        
        $this->getQueryBuilderFindByKey($keySearch);
        
        $this->applyFilters($meta);

        return $this->instance->limit($limit)->get();
    }

    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->where(function($query) use ($key){
            return $query->where('username', 'LIKE', '%'.$key.'%')
            ->orWhere('phone', 'LIKE', '%'.$key.'%')
            ->orWhere('email', 'LIKE', '%'.$key.'%')
            ->orWhere('fullname', 'LIKE', '%'.$key.'%');
        });
    }
}