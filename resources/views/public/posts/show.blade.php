@extends('public.layouts.master')

@section('content')
    <!-- Content -->
    <main class="container py-5">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div>
                    <h1 class="title-section mb-3" style="font-size: 2em">{{ $posts['title'] }}</h1>
                    <div class="product-last-seen">
                        <span class="fw-bold fst-italic">Ngày viết: {{ $posts->created_at->format('d/m/Y') }}</span>
                    </div>
                    <br>
                    <p>{!! $posts['excerpt'] !!}</p>
                    <p>{!! $posts['content'] !!}</p>
                </div>
                <span class="d-flex align-items-center gap-3 mt-5">
                    <span class="text-black-50 fw-bold related-posts">Các bài viết khác</span>
                    <div class="title-sep-container">
                        <div class="title-sep sep-double sep-solid"></div>
                    </div>
                </span>

                <div class="row justify-content-evenly py-2 flex-wrap">

                    @foreach ($related as $post)
                        <div class="col-lg-3 col-md-6 text-center p-3 mb-5 box-blog">
                            <img src="{{ asset($post->feature_image) }}" alt="Bài viết" class="img-fluid">
                            <a href="{{ route('post.show', $post->slug) }}"
                                class="text-uppercase mt-3 fw-bold nav-link pb-3">{{ $post->title }}</a>
                            <span class="d-flex gap-2">
                                <p class="fw-normal text-black-50">Ngày viết: {{ $post->created_at->format('d/m/Y') }}</p>
                            </span>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>
    </main>
@endsection
