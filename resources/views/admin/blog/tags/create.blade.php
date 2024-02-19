@extends('admin.layouts.master')
@push('libs-css')

@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.blog.tag.store')" type="post" :validate="true">
                <div class="row justify-content-center">
                    @include('admin.blog.tags.forms.create-left')
                    @include('admin.blog.tags.forms.create-right')
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
