@extends('admin.layouts.master')
@push('custom-css')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <i class="ti ti-user"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold text-primary">
                                                {{ $total_user }}
                                            </div>
                                            <div class="text-secondary">
                                                @lang('user')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">{{ __('Biểu đồ doanh thu 7 ngày gần đây') }}</h3>
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('libs-js')
    <!-- Resources -->
@endpush

@push('custom-js')
    <!-- Chart code -->
    
@endpush
