<div class="modal modal-blur fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">@lang('Are you sure?')</div>
                <div>@lang('If you continue, the data will be deleted from the system.')</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">@lang('cancel')</button>
                <x-form id="modalFormDelete" action="#" type="delete">
                    <button type="submit" class="btn btn-danger">@lang('delete')</button>
                </x-form>
            </div>
        </div>
    </div>
</div>
<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#modalDelete">@lang('openModal')</button>