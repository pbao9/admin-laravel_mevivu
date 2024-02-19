<?php

namespace App\Admin\Http\Controllers\Slider;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Slider\SliderRequest;
use App\Admin\Repositories\Slider\SliderRepositoryInterface;
use App\Admin\Services\Slider\SliderServiceInterface;
use App\Admin\DataTables\Slider\SliderDataTable;
use App\Enums\DefaultStatus;

class SliderController extends Controller
{
    public function __construct(
        SliderRepositoryInterface $repository, 
        SliderServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){
        return [
            'index' => 'admin.sliders.index',
            'create' => 'admin.sliders.create',
            'edit' => 'admin.sliders.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.slider.index',
            'create' => 'admin.slider.create',
            'edit' => 'admin.slider.edit',
            'delete' => 'admin.slider.delete'
        ];
    }
    public function index(SliderDataTable $dataTable){

        return $dataTable->render($this->view['index'],
            [
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('slider'))
            ]
        );
    }

    public function create(){

        return view($this->view['create'], 
            [
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('slider'), route($this->route['index']))->add(__('add'))
            ]
        );
    }

    public function store(SliderRequest $request){

        $response = $this->service->store($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){

        $response = $this->repository->findOrFail($id);

        return view(
            $this->view['edit'],
            [
                'slider' => $response,
                'status' => DefaultStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('slider'), route($this->route['index']))->add(__('edit'))
            ]
        );
    }
 
    public function update(SliderRequest $request){

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