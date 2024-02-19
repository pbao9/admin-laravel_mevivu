@extends('admin.layouts.master')
@push('libs-css')

@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.blog.tag.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$tag->id" />
                <div class="row justify-content-center">
                    @include('admin.blog.tags.forms.edit-left')
                    @include('admin.blog.tags.forms.edit-right')
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
