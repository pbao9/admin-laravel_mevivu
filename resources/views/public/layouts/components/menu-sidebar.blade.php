<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title fw-bold" id="offcanvasStartLabel">Danh mục</h1>
        <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body py-0">
        <ul class="list-unstyled">
            @if ($menu && $menu->items)
            @foreach ($menu->items->toTree() as $item)
            @if ($item->hasChild())
            <li class="nav-item border-bottom py-3">
                <a class="nav-link d-flex justify-content-between" data-bs-toggle="collapse" href="#{{ $item->id }}"
                    role="button" aria-expanded="false">
                    {{ $item->title }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 9l6 6l6 -6" />
                    </svg>
                </a>
                @foreach ($item->children as $children)
                <ul class="collapse list-unstyled ps-3" id="{{ $children->parent_id }}">
                    <li class="my-2">
                        <a class="nav-link d-flex align-items-center" href="{{ $children->getUrl() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                            </svg>
                            <span class="px-2">{{ $children->title }}</span>
                        </a>
                    </li>
                </ul>
                @endforeach
            </li>
            @else
            <li class="nav-item border-bottom py-3">
                <a class="nav-link" href="{{ $item->getUrl() }}">
                    <span class="nav-link-title">
                        {{ $item->title }}
                    </span>
                </a>
            </li>
            @endif
            @endforeach
            @endif
            <div class="input-icon my-3">
                <input type="text" value="" class="form-control shadow-none" placeholder="Tìm kiếm sản phẩm...">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                        <path d="M21 21l-6 -6"></path>
                    </svg>
                </span>
            </div>
        </ul>
    </div>
</div>