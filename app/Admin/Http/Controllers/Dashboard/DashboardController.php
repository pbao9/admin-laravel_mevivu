<?php

namespace App\Admin\Http\Controllers\Dashboard;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\User\UserRepositoryInterface;

class DashboardController extends Controller
{
    public $repoUser;

    public function __construct(
        UserRepositoryInterface $repoUser
    )
    {
        parent::__construct();
        $this->repoUser = $repoUser;
    }

    public function getView()
    {
        return [
            'index' => 'admin.dashboard.index'
        ];
    }
    public function index(){
        $totaluser = $this->repoUser->count();
        
        return view($this->view['index'], [
            'total_user' => $totaluser,
            'breadcrums' => $this->crums
        ]);
    }

}