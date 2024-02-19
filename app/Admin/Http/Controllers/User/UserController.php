<?php

namespace App\Admin\Http\Controllers\User;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\User\UserRequest;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\User\UserServiceInterface;
use App\Admin\DataTables\User\UserDataTable;
use App\Enums\Gender;

class UserController extends Controller
{
    public function __construct(
        UserRepositoryInterface $repository, 
        UserServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){
        return [
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'edit' => 'admin.users.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.user.index',
            'create' => 'admin.user.create',
            'edit' => 'admin.user.edit',
            'delete' => 'admin.user.delete'
        ];
    }
    public function index(UserDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('user'))
        ]);
    }

    public function create(){
        return view($this->view['create'], [
            'gender' => Gender::asSelectArray(),
            'breadcrums' => $this->crums->add(__('user'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(UserRequest $request){

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
                'user' => $instance, 
                'gender' => Gender::asSelectArray(),
                'breadcrums' => $this->crums->add(__('user'), route($this->route['index']))->add(__('edit'))
            ], 
        );
    }

    public function update(UserRequest $request){

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