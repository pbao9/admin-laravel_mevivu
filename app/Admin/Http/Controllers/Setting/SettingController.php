<?php

namespace App\Admin\Http\Controllers\Setting;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Setting\SettingRepositoryInterface;
use App\Enums\Setting\SettingGroup;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(
        SettingRepositoryInterface $repository
    )
    {
        parent::__construct();
        $this->repository = $repository;    
    }
    public function getView()
    {
        return [
            'general' => 'admin.settings.general'
        ];
    }
    public function general(){
        $settings = $this->repository->getByGroup([SettingGroup::General]);
        return view($this->view['general'], [
            'settings' => $settings,
            'breadcrums' => $this->crums->add(__('generateSetting'))
        ]);
    }

    public function update(Request $request){
        $data = $request->except('_token', '_method');
        $this->repository->updateMultipleRecord($data);
        return back()->with('success', __('notifySuccess'));
    }
}