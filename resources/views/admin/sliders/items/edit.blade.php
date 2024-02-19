@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.slider.item.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$sliderItem->id" />
                <x-input type="hidden" name="slider_id" :value="$sliderItem->slider_id" />
                <div class="row justify-content-center">
                    @include('admin.sliders.items.forms.edit-left')
                    @include('admin.sliders.items.forms.edit-right')
                </div>
                @include('admin.forms.actions-fixed')
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
    @include('ckfinder::setup')
@endpush