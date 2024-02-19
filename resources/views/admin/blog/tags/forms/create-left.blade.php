<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- name -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">@lang('name')</label>
                        <x-input name="name" :value="old('name')" :required="true" :placeholder="__('name')" />
                    </div>
                </div>
                <!-- description -->
                <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label">@lang('description')</label>
                        <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
