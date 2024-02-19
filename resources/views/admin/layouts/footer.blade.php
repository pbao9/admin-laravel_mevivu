<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    @if(auth('admin')->user()->isSuperAdmin())
                        <li class="list-inline-item">
                            <a href="{{ asset(config('idoc.path')) }}" target="_blank" class="link-secondary">
                                {{ __('Documentation api') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2023
                        <a href="#" class="link-secondary">Admin</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-secondary" rel="noopener">
                            v1.0.0-beta
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
