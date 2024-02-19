<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            @lang('action')
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <div class="d-flex align-items-center h-100 gap-2">
                <x-button.submit :title="__('save')" name="submitter" value="save" />
                <x-button type="submit" name="submitter" value="saveAndExit">
                    @lang('save&exit')
                </x-button>
            </div>
            <x-button.modal-delete data-route="{{ route('admin.slider.delete', $slider->id) }}" :title="__('delete')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            @lang('status')
        </div>
        <div class="card-body p-2">
            <x-select class="form-select" name="status" :required="true">
                @foreach ($status as $key => $value )
                    <x-select-option :option="$slider->status->value" :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>