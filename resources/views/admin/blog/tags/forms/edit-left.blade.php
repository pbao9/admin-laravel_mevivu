<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- name -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">@lang('name')</label>
                        <x-input name="name" :value="$tag->name" :required="true" placeholder="{{ __('Tiêu đề') }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">@lang('slug'):</label>
                        <x-input-prepended-text :pText="config('custom.frontend_url') . config('custom.prefix_url.tag')" name="slug" :value="old('slug', $tag->slug)" />
                    </div>
                </div>
                <!-- description -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">@lang('description')</label>
                        <textarea class="form-control" name="description" rows="5">{{ $tag->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
