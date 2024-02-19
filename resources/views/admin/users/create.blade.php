@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.user.store')" type="post" :validate="true">
                <div class="row justify-content-center">
                    @include('admin.users.forms.create-left')
                    @include('admin.users.forms.create-right')
                </div>
                @include('admin.forms.actions-fixed')
            </x-form>
        </div>
    </div>
@endsection
