<div class="modal modal-blur fade" id="modal-search" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tìm kiếm sản phẩm</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="dropdown search-modal">
                    <div class="input-icon d-flex gap-2 flex-column">
                        <div class="d-flex gap-2">
                            <x-input id="inputSearchProduct" class="shadow-none" aria-expanded="false" :placeholder="trans('Tìm kiếm sản phẩm...')" />
                            {{-- <button type="button" class="btn btn-cyan">Tìm kiếm</button> --}}
                        </div>

                        <div id="resultSearchProduct">
                            <ul class="search_box overflow-y-scroll list-unstyled"></ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
