@extends('admin.layouts.master')

@push('libs-css')

@endpush
@push('custom-css')
 
@endpush

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">@lang('list')</h2>
                    <x-link :href="route('admin.blog.tag.create')" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        @lang('add')
                    </x-link>
                </div>
                <div class="card-body">
                    <div class="table-responsive position-relative">
                        <x-admin.partials.toggle-column-datatable />
                        {{$dataTable->table(['class' => 'table table-bordered'], true)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('libs-js')
<!-- button in datatable -->
<script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>

@endpush

@push('custom-js')

{{ $dataTable->scripts() }}

@include('admin.scripts.datatable-toggle-columns', [
    'id_table' => $dataTable->getTableAttribute('id')
])

@endpush
