{{-- Product --}}
<div class="search-dropdown">
    <div class="card-header border-bottom my-2 p-3">
        <h3 class="title-text">@lang('cart')</h3>
    </div>
    <div class="overflow-y-scroll d-flex flex-column px-2" style="height: 450px">
        @forelse ($shopping_carts as $shopping_cart)
            @include('public.shopping_carts.partials.item', ['shopping_cart' => $shopping_cart, 'type' => 'small'])
        @empty
            @include('public.partials.no-record')
        @endforelse
    </div>
    {{-- <div class="d-flex flex-row justify-content-between px-3 mb-3 align-items-center my-3 border-top py-3">
        <span class="text-uppercase fw-bold">Tổng số lượng</span>
        <span><span id="total_count" class="fw-bold">150</span> miếng</span>
    </div> --}}
    @if($shopping_carts->count())
        <div class="d-flex flex-row justify-content-between px-3 mb-3 align-items-center my-3">
            <span class="text-uppercase fw-bold">@lang('Tổng tiền')</span>
            <span class="fw-bold">{{ format_price($shopping_carts->sum('price_total')) }}</span>
        </div>
        <div class="d-flex flex-row justify-content-end px-3 gap-3 my-3">
            <a href="{{ route('shopping_cart.index') }}" class="btn btn-outline-cyan">@lang('Xem giỏ hàng')</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-outline-danger">@lang('Thanh toán')</a>
        </div>
    @endif
</div>