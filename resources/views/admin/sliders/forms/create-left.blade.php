<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('name')</label>
                    <x-input name="name" :value="old('name')" :required="true" placeholder="{{ __('Tên slider') }}" />
                </div>
            </div>
            <!-- name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('keyIdentity')</label>
                    <x-input name="plain_key" :value="old('plain_key')" :required="true" :placeholder="__('keyIdentity')" />
                </div>
            </div>
            <!-- desc -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('description')</label>
                    <textarea class="form-control" name="desc">{{ old('desc') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>