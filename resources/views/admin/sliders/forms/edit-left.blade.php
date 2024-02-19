<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-end">
            <x-link :href="route('admin.slider.item.index', $slider->id)" :title="__('sliderItem')" />
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('name')</label>
                    <x-input name="name" :value="$slider->name" :required="true"
                        :placeholder="__('name')" />
                </div>
            </div>
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('keyIdentity') }}:</label>
                    <x-input name="plain_key" :value="$slider->plain_key" :required="true"
                        :placeholder="__('keyIdentity')" />
                </div>
            </div>
            <!-- desc -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('description')</label>
                    <textarea class="form-control" name="desc">{{ $slider->desc }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>