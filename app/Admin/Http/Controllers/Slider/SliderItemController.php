<?php

namespace App\Admin\Http\Controllers\Slider;

use App\Admin\Http\Controllers\Controller;
use App\Admin\DataTables\Slider\SliderItemDataTable;
use App\Admin\Repositories\Slider\{SliderRepositoryInterface, SliderItemRepositoryInterface};
use App\Admin\Services\Slider\SliderItemServiceInterface;
use App\Admin\Http\Requests\Slider\SliderItemRequest;

class SliderItemController extends Controller
{
    protected $repositorySlider;
    public function __construct(
        SliderItemRepositoryInterface $repository,
        SliderRepositoryInterface $repositorySlider,
        SliderItemServiceInterface $service
    )
    {
        parent::__construct();
        
        $this->repository = $repository;
        $this->repositorySlider = $repositorySlider;
        $this->service = $service;
    }
    public function getView(){
        return [
            'index' => 'admin.sliders.items.index',
            'create' => 'admin.sliders.items.create',
            'edit' => 'admin.sliders.items.edit'
        ];
    }

    public function getRoute(){
        return [
            'index_slider' => 'admin.slider.index',
            'index' => 'admin.slider.item.index',
            'create' => 'admin.slider.item.create',
            'edit' => 'admin.slider.item.edit',
            'delete' => 'admin.slider.item.delete'
        ];
    }
    public function index($slider_id, SliderItemDataTable $dataTable){

        $slider = $this->repositorySlider->findOrFail($slider_id);

        return $dataTable->with('slider', $slider)->render($this->view['index'], [
            'slider' => $slider,
            'breadcrums' => $this->crums->add(__('listSlider'), route($this->route['index_slider']))->add(__('listSliderItem'))
        ]);
    }

    public function create($slider_id){

        $slider = $this->repositorySlider->findOrFail($slider_id);

        return view($this->view['create'], [
            'slider' => $slider,
            'breadcrums' => $this->crums->add(__('listSlider'), route($this->route['index_slider']))
            ->add(__('listSliderItem'), route($this->route['index'], $slider->id))
            ->add(__('addSliderItem'))
        ]);
    }

    public function store(SliderItemRequest $request){

        $response = $this->service->store($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'], $response->slider_id)->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($slider_id, $id){

        $sliderItem = $this->repository->findOrFail($id, ['slider']);

        return view($this->view['edit'], [
            'sliderItem' => $sliderItem,
            'breadcrums' => $this->crums->add(__('listSlider'), route($this->route['index_slider']))
            ->add(__('listSliderItem'), route($this->route['index'], $sliderItem->slider->id))
            ->add(__('editSliderItem'))
        ]);
    }

    public function update(SliderItemRequest $request){

        $response = $this->service->update($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? back()->with('success', __('notifySuccess'))
                    : to_route($this->route['index'], $response->slider_id)->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function delete($slider_id, $id){

        $this->service->delete($id);
        
        return to_route($this->route['index'], $slider_id)->with('success', __('notifySuccess')); 
    }
}