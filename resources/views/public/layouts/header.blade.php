<header class="header-main">
    <div class="overlay"></div>
    <header class="navbar navbar-expand-md d-print-none border-bottom">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart"
                aria-controls="offcanvasStart">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal mx-auto">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset($settings['site_logo']) }}" style="height: 20%; width:230px" alt="Tabler"
                        class="navbar-brand-image ms-md-5 ps-md-5 ms-0 ps-0">
                </a>
            </h1>
            <div class="d-flex justify-content-end align-items-center">
                <div class="d-md-block d-none">
                    <div class="nav-item dropdown me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="modal" tabindex="-1"
                            aria-label="Search" data-bs-target="#modal-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <i class="fa-solid fa-circle-user px-2 fs-1"></i>
                        @auth
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->fullname() }}</div>
                                <div class="mt-1 small text-muted">{{ auth()->user()->roleName() }}</div>
                            </div>
                        @endauth
                    </a>

                </div>
            </div>
        </div>
    </header>
    <header class="navbar-expand-md shadow-lg border-bottom">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <ul class="navbar-nav mx-auto">
                        @if ($menu && $menu->items)
                            @foreach ($menu->items->toTree() as $item)
                                @if ($item->hasChild())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{ $item->getUrl() }}"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-title px-1 fw-bold">
                                                {{ $item->title }}
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    @foreach ($item->children as $children)
                                                        <a class="dropdown-item" href="{{ $children->getUrl() }}">
                                                            {{ $children->title }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $item->getUrl() }}">
                                            <span class="nav-link-title fw-bold">
                                                {{ $item->title }}
                                            </span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </header>
</header>




@include('public.layouts.components.menu-sidebar')
