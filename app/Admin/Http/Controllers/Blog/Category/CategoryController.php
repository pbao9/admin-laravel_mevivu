<?php

namespace App\Admin\Http\Controllers\Blog\Category;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Blog\Category\CategoryRequest;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Services\Blog\Category\CategoryServiceInterface;
use App\Admin\DataTables\Blog\Category\CategoryDataTable;
use App\Enums\DefaultStatus;

class CategoryController extends Controller
{
    public function __construct(
        CategoryRepositoryInterface $repository, 
        CategoryServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){
        
        return [
            'index' => 'admin.blog.categories.index',
            'create' => 'admin.blog.categories.create',
            'edit' => 'admin.blog.categories.edit'
        ];
    }

    public function getRoute(){

        return [
            'index' => 'admin.blog.category.index',
            'create' => 'admin.blog.category.create',
            'edit' => 'admin.blog.category.edit',
            'delete' => 'admin.blog.category.delete'
        ];
    }
    public function index(CategoryDataTable $dataTable){

        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('blog'))->add(__('category'))
        ]);
    }

    public function create(){

        $categories = $this->repository->getFlatTree();

        return view($this->view['create'], [
            'categories' => $categories,
            'status' => DefaultStatus::asSelectArray(),
            'breadcrums' => $this->crums->add(__('blog'))->add(__('category'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(CategoryRequest $request){

        $response = $this->service->store($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){

        $categories = $this->repository->getFlatTreeNotInNode([$id]);
        
        $category = $this->repository->findOrFail($id);

        return view(
            $this->view['edit'], 
            [
                'category' => $category, 
                'categories' => $categories, 
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('blog'))->add(__('category'), route($this->route['index']))->add(__('edit'))
            ], 
        );
    }

    public function update(CategoryRequest $request){

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