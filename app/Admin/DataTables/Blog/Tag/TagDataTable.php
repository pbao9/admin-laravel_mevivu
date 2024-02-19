<?php

namespace App\Admin\DataTables\Blog\Tag;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Repositories\Tag\TagRepositoryInterface;
use App\Enums\DefaultStatus;

class TagDataTable extends BaseDataTable
{

    protected $nameTable = 'tagTable';

    protected $repoCat;

    public function __construct(
        TagRepositoryInterface $repository
    ){
        $this->repository = $repository;

        parent::__construct();
    }

    public function setView(){
        $this->view = [
            'action' => 'admin.blog.tags.datatable.action',
            'feature_image' => 'admin.blog.tags.datatable.feature-image',
            'name' => 'admin.blog.tags.datatable.name',
            'status' => 'admin.blog.tags.datatable.status',
            'categories' => 'admin.blog.tags.datatable.categories'
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 1, 2];
        
        $this->columnSearchDate = [2];

        $this->columnSearchSelect = [
            [
                'column' => 1,
                'data' => DefaultStatus::asSelectArray()
            ],
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
        return $this->repository->getQueryBuilderOrderBy();
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.tag', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'name' => $this->view['name'],
            'status' => $this->view['status'],
            'created_at' => '{{ format_date($created_at) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['name', 'status', 'action'];
    }
}