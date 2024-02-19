@extends('admin.layouts.master')
@push('libs-css')
@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.slider.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$slider->id" />
                <div class="row justify-content-center">
                    @include('admin.sliders.forms.edit-left')
                    @include('admin.sliders.forms.edit-right')
                </div>
                @include('admin.forms.actions-fixed')
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
@endpush

@push('custom-js')

@endpush
