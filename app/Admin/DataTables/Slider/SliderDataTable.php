<?php

namespace App\Admin\DataTables\Slider;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Slider\SliderRepositoryInterface;
use App\Enums\DefaultStatus;

class SliderDataTable extends BaseDataTable
{

    protected $nameTable = 'sliderTable';

    public function __construct(
        SliderRepositoryInterface $repository
    ){
        $this->repository = $repository;
        
        parent::__construct();

    }

    public function setView(){
        $this->view = [
            'action' => 'admin.sliders.datatable.action',
            'name' => 'admin.sliders.datatable.name',
            'status' => 'admin.sliders.datatable.status',
            'items' => 'admin.sliders.datatable.items',
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 1, 2, 4];

        $this->columnSearchDate = [4];

        $this->columnSearchSelect = [
            [
                'column' => 2,
                'data' => DefaultStatus::asSelectArray()
            ]
        ];
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getByQueryBuilder([], ['items']);
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.slider', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'name' => $this->view['name'],
            'status' => $this->view['status'],
            'items' => $this->view['items'],
            'created_at' => '{{ format_date($created_at) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['name', 'status', 'items', 'action'];
    }
}