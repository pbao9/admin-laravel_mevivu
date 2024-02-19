<?php

namespace App\Admin\Services\Blog\Tag;

use App\Admin\Services\Blog\Tag\TagServiceInterface;
use  App\Admin\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagService implements TagServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(TagRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}