@extends('admin.layouts.master')

@push('libs-css')
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@push('custom-css')
    <style>
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered .select2-selection__choice{
            font-size: 0.7rem;
        }
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered .select2-selection__choice .select2-selection__choice__remove{
            width: 0.5rem;
            height: 0.5rem;
        }
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered .select2-selection__choice{
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">@lang('list')</h2>
                    <x-link :href="route('admin.blog.post.create')" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        @lang('add')
                    </x-link>
                </div>
                <div class="card-body">
                    <x-form id="formMultiple" :action="route('admin.blog.post.action_multiple_record')" type="post" :validate="true">
                        <div class="table-responsive position-relative">
                            <x-admin.partials.toggle-column-datatable />
                            @isset($actionMultiple)
                                <x-admin.partials.select-action-multiple :actionMultiple="$actionMultiple" />
                            @endisset
                            {{ $dataTable->table(['class' => 'table table-bordered'], true) }}
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('libs-js')
<!-- button in datatable -->
<script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('/public/libs/select2/dist/js/i18n/'.trans()->getLocale().'.js') }}"></script>
@endpush

@push('custom-js')

{{ $dataTable->scripts() }}

@include('admin.scripts.datatable-toggle-columns', [
    'id_table' => $dataTable->getTableAttribute('id')
])
@endpush
