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
            <x-button.modal-delete data-route="{{ route('admin.blog.post.delete', $post->id) }}" :title="__('delete')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            @lang('category')
        </div>
        <div class="card-body p-2 wrap-list-checkbox">
            @foreach ($categories as $category)
                <x-input-checkbox :checked="$post->categories->pluck('id')->toArray()" :depth="$category->depth" name="categories_id[]" :label="$category->name" :value="$category->id"/>
            @endforeach
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            @lang('status')
        </div>
        <div class="card-body p-2">
            <x-select name="status" :required="true">
                @foreach ($status as $key => $value)
                    <x-select-option :option="$post->status->value" :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>
    
    <div class="card mb-3">
        <div class="card-header">
            @lang('avatar')
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="feature_image" showImage="featureImage" :value="$post->feature_image"/>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @lang('tag')
        </div>
        <div class="card-body">
            <x-select name="tag_id[]" class="select2-bs5-ajax" :data-url="route('admin.search.select.tag')" :multiple="true">
                @foreach ($post->tags as $item)
                    <x-select-option :option="$item->id" :value="$item->id" :title="$item->name" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>