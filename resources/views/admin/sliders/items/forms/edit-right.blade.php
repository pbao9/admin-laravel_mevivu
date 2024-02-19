<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('action') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <div class="d-flex align-items-center h-100 gap-2">
                <x-button.submit :title="__('save')" name="submitter" value="save" />
                <x-button type="submit" name="submitter" value="saveAndExit">
                    @lang('save&exit')
                </x-button>
            </div>
            <x-button.modal-delete data-route="{{ route('admin.slider.item.delete', ['slider_id' => $sliderItem->slider_id ?? 0, 'id' => $sliderItem->id]) }}" :title="__('delete')" />
        </div>
    </div>
</div>