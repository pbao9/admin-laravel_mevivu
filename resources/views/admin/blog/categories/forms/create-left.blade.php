<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- name -->
            <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('name'):</label>
                    <x-input name="name" :value="old('name')" :required="true"
                        :placeholder="__('name')" />
                </div>
            </div>
            <!-- chuyên mục cha -->
            <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('parent'):</label>
                    <x-select class="select2-bs5" name="parent_id">
                        <x-select-option value="" :title="__('empty')" />
                        @foreach ($categories as $category)
                            <x-select-option :value="$category->id" :title="generate_text_depth_tree($category->depth).' '.__($category->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- position -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('position'):</label>
                    <x-input type="number" name="position" :value="old('position', 0)" :required="true" />
                </div>
            </div>
            <!-- status -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">@lang('status'):</label>
                    <x-select name="status" :required="true">
                        @foreach ($status as $key => $value)
                            <x-select-option :value="$key" :title="$value" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>
    </div>
</div>