<!-- Footer -->


@includeWhen(auth()->check() && !isset($shopping_carts), 'public.layouts.components.floating-cart')

@include('public.layouts.components.floating-contact')

<footer>
    <div class="overlay"></div>
    <div class="py-3 d-flex flex-column">
        <div class="d-flex flex-row gap-4 container flex-wrap">
            @if ($menu)
                @foreach ($menu->items as $item)
                    <a class="nav-link" href="{{ $item->getUrl() }}">
                        <span class="nav-link-title">
                            {{ $item->title }}
                        </span>
                    </a>
                @endforeach
            @endif
        </div>
        <hr>
        <div class="row justify-content-between p-0 m-0">
            <div class="col-12 col-md-4 p-5 rounded">
                {!! $settings['iframe_map'] !!}
            </div>
            <div class="col-12 col-md-4 py-2 py-md-5">
                <div class="d-flex flex-column mb-3">
                    <p class="text-uppercase fw-bold title-text">Giới thiệu</p>
                    {{ $settings['introduce_short'] }}
                </div>

                <div class="d-flex flex-column">
                    <p class="text-uppercase fw-bold title-text">Hệ thống cửa hàng</p>
                    <a href="#" class="text-decoration-none" style="color:#4872fa"><i
                            class="fa-solid fa-location-dot px-2"></i> {{ $settings['address'] }}</a>
                </div>

            </div>
            <div class="col-12 col-md-4 d-flex  justify-content-between">
                <div class="col-12 py-2 py-md-5">
                    <p class="text-uppercase fw-bold title-text">Hướng Dẫn Mua Hàng</p>
                    @if ($menuShopping)
                        <ul class="me-auto text-center ">
                            @foreach ($menuShopping->items as $item)
                                <a class="nav-link" href="{{ $item->getUrl() }}">
                                    <li class="nav-link-title">
                                        {{ $item->title }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @endif
                    <p class="my-3">Hotline: <span style="color:#4872fa;">{{ $settings['hotline'] }}</span></p>
                    <p class="my-3">Contact: <span style="color:#4872fa;">{{ $settings['email'] }}</span></p>
                    <p class="my-3">Thời gian mở cửa: {{ $settings['open_time'] }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer -->
