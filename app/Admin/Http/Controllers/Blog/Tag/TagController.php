<?php

namespace App\Admin\Http\Controllers\Blog\Tag;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Blog\Tag\TagRequest;
use App\Admin\Repositories\Tag\TagRepositoryInterface;
use App\Admin\Services\Blog\Tag\TagServiceInterface;
use App\Admin\DataTables\Blog\Tag\TagDataTable;
use App\Enums\DefaultStatus;

class TagController extends Controller
{
    public function __construct(
        TagRepositoryInterface $repository, 
        TagServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){

        return [
            'index' => 'admin.blog.tags.index',
            'create' => 'admin.blog.tags.create',
            'edit' => 'admin.blog.tags.edit'
        ];
    }

    public function getRoute(){

        return [
            'index' => 'admin.blog.tag.index',
            'create' => 'admin.blog.tag.create',
            'edit' => 'admin.blog.tag.edit',
            'delete' => 'admin.blog.tag.delete'
        ];
    }
    public function index(TagDataTable $dataTable){

        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('blog'))->add(__('tag'))
        ]);
    }

    public function create(){

        return view($this->view['create'], [
            'status' => DefaultStatus::asSelectArray(),
            'breadcrums' => $this->crums->add(__('blog'))->add(__('tag'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(TagRequest $request){

        $response = $this->service->store($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){

        $tag = $this->repository->findOrFail($id);

        return view(
            $this->view['edit'], 
            [
                'tag' => $tag, 
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('blog'))->add(__('tag'), route($this->route['index']))->add(__('edit'))
            ], 
        );
    }

    public function update(TagRequest $request){

        $response = $this->service->update($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? back()->with('success', __('notifySuccess'))
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));
    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}