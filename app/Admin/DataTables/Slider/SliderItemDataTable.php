<?php

namespace App\Admin\DataTables\Slider;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Slider\SliderItemRepositoryInterface;

class SliderItemDataTable extends BaseDataTable
{

    protected $nameTable = 'sliderItemTable';

    public function __construct(
        SliderItemRepositoryInterface $repository
    ){
        $this->repository = $repository;
        
        parent::__construct();


    }

    public function setView(){
        $this->view = [
            'action' => 'admin.sliders.items.datatable.action',
            'title' => 'admin.sliders.items.datatable.title',
            'image' => 'admin.sliders.items.datatable.image',
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 3];

        $this->columnSearchDate = [3];
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getByQueryBuilder(['slider_id' => $this->slider->id]);
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.slider_item', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'title' => $this->view['title'],
            'image' => $this->view['image'],
            'created_at' => '{{ format_date($created_at) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['title', 'image', 'action'];
    }
}