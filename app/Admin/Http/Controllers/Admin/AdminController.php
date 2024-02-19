<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Admin\AdminRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Admin\DataTables\Admin\AdminDataTable;

class AdminController extends Controller
{
    public function __construct(
        AdminRepositoryInterface $repository, 
        AdminServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){
        return [
            'index' => 'admin.admins.index',
            'create' => 'admin.admins.create',
            'edit' => 'admin.admins.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.admin.index',
            'create' => 'admin.admin.create',
            'edit' => 'admin.admin.edit',
            'delete' => 'admin.admin.delete'
        ];
    }
    public function index(AdminDataTable $dataTable){
        
        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('admin'))
        ]);
    }

    public function create(){

        return view($this->view['create'], [
            'roles' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase(),
            'breadcrums' => $this->crums->add(__('admin'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(AdminRequest $request){

        $response = $this->service->store($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        
        $instance = $this->repository->findOrFail($id);

        return view(
            $this->view['edit'], 
            [
                'admin' => $instance, 
                'roles' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase(),
                'breadcrums' => $this->crums->add(__('admin'), route($this->route['index']))->add(__('edit'))
            ], 
        );
    }

    public function update(AdminRequest $request){

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