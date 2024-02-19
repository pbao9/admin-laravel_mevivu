<?php

namespace App\Admin\DataTables\Page;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Page\PageRepositoryInterface;

class PageDataTable extends BaseDataTable
{

    protected $nameTable = 'pageTable';

    public function __construct(
        PageRepositoryInterface $repository
    ){
        $this->repository = $repository;
        
        parent::__construct();

    }

    public function setView(){
        $this->view = [
            'action' => 'admin.pages.datatable.action',
            'title' => 'admin.pages.datatable.title'
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 1];

        $this->columnSearchDate = [1];
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderOrderBy();
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.page', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'title' => $this->view['title'],
            'created_at' => '{{ format_date($created_at) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['title', 'action'];
    }
}