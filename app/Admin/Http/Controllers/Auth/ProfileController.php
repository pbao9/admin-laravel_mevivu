<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Http\Requests\Auth\ProfileRequest;

class ProfileController extends BaseController
{
    //
    public function getView(){
        return [
            'index' => 'admin.auth.profile.index'
        ];
    }
    public function index(){

        $auth = auth('admin')->user();
        
        return view($this->view['index'], [
            'auth' => $auth,
            'breadcrums' => $this->crums->add(__('profile'))
        ]);

    }

    public function update(ProfileRequest $request){
        auth('admin')->user()->update($request->validated());
        return back()->with('success', __('notifySuccess'));
    }

}
