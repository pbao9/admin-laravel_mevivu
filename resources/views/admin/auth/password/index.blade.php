@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <x-form :action="route('admin.password.update')" type="put" enctype="multipart/form-data" :validate="true">
                    <div class="card">
                        <div class="card-body">
                            <!-- password old -->
                            <div class="mb-3">
                                <label class="control-label">@lang('passwordOld'):</label>
                                <x-input-password name="old_password" :required="true"/>
                            </div>
                            <!-- new password -->
                            <div class="mb-3">
                                <label class="control-label">@lang('passwordNew'):</label>
                                <x-input-password name="password" :required="true"/>
                            </div>
                            <!-- new password confirmation-->
                            <div class="mb-3">
                                <label class="control-label">@lang('passwordConfirm'):</label>
                                <x-input-password name="password_confirmation" :required="true" data-parsley-equalto="input[name='password']" data-parsley-equalto-message="{{ __('passwordMismatch') }}"/>
                            </div>
                            <div class="btn-list justify-content-center">
                                <x-button.submit :title="__('passwordChange')" />
                            </div>
                        </div>
                    </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
