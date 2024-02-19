<?php

namespace App\Admin\DataTables\Blog\Post;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Enums\DefaultStatus;

class PostDataTable extends BaseDataTable
{

    protected $nameTable = 'postTable';

    protected $repoCat;

    public function __construct(
        PostRepositoryInterface $repository,
        CategoryRepositoryInterface $repoCat
    ){
        $this->repository = $repository;

        $this->repoCat = $repoCat;
        
        parent::__construct();
    }

    public function setView(){
        $this->view = [
            'action' => 'admin.blog.posts.datatable.action',
            'feature_image' => 'admin.blog.posts.datatable.feature-image',
            'title' => 'admin.blog.posts.datatable.title',
            'status' => 'admin.blog.posts.datatable.status',
            'categories' => 'admin.blog.posts.datatable.categories',
            'checkbox' => 'admin.blog.posts.datatable.checkbox',
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [2, 3, 4, 5];

        $this->columnSearchDate = [5];
        
        $this->columnSearchSelect = [
            [
                'column' => 3,
                'data' => DefaultStatus::asSelectArray()
            ],
        ];

        $this->columnSearchSelect2 = [
            [
                'column' => 4,
                'data' => $this->repoCat->getFlatTree()->map(function($category){
                    return [$category->id => generate_text_depth_tree($category->depth).$category->name];
                })
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
        return $this->repository->getByQueryBuilder([], ['categories']);
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.post', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'feature_image' => $this->view['feature_image'],
            'title' => $this->view['title'],
            'status' => $this->view['status'],
            'categories' => $this->view['categories'],
            'created_at' => '{{ format_date($created_at) }}',
            'checkbox' => $this->view['checkbox'],
        ];
    }
    protected function setCustomFilterColumns()
    {
        $this->customFilterColumns = [
            'categories' => function($query, $keyword) {
                $query->whereHas('categories', function($q) use($keyword) {
                    $q->whereIn('id', explode(',', $keyword));
                });
            }
        ];
    }
    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['checkbox', 'feature_image', 'title', 'status', 'categories', 'action'];
    }
}