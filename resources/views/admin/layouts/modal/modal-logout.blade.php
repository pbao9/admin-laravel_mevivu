<div class="modal modal-blur fade" id="modalLogout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">@lang('Are you sure?')</div>
                <div>@lang('If you continue, Your will logout from the system.')</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">@lang('cancel')</button>
                <x-form :action="route('admin.logout')" type="post">
                    <button type="submit" class="btn btn-danger">@lang('logout')</button>
                </x-form>
            </div>
        </div>
    </div>
</div>