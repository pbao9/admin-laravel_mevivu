<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- name -->
            <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('name'):</label>
                    <x-input name="name" :value="$category->name" :required="true"
                        :placeholder="__('name')" />
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">@lang('slug'):</label>
                    <x-input-prepended-text :pText="config('custom.frontend_url').config('custom.prefix_url.category')" name="slug" :value="old('slug', $category->slug)" />
                </div>
            </div>
            <!-- parent id -->
            <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('parent'):</label>
                    <x-select class="select2-bs5" name="parent_id">
                        <x-select-option value="" :title="__('empty')" />
                        @foreach ($categories as $item)
                            <x-select-option :option="$category->parent_id" :value="$item->id" :title="generate_text_depth_tree($item->depth).' '.__($item->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- position -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('position'):</label>
                    <x-input type="number" name="position" :value="$category->position" :required="true" />
                </div>
            </div>
            <!-- status -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('status'):</label>
                    <x-select name="status" :required="true">
                        @foreach ($status as $key => $value)
                            <x-select-option :option="$category->status->value" :value="$key" :title="$value" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            
        </div>
    </div>
</div>