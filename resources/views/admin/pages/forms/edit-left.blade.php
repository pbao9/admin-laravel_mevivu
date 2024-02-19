<div class="col-12 col-md-9">
    <div class="row">
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('title')</label>
                <x-input name="title" :value="$page->title" :required="true" :placeholder="__('title')" />
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label">@lang('slug'):</label>
                <x-input-prepended-text :pText="config('custom.frontend_url').config('custom.prefix_url.page')" name="slug" :value="old('slug', $page->slug)" />
            </div>
        </div>
        <!-- content -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('content')</label>
                <textarea name="content" class="ckeditor visually-hidden">{{ $page->content }}</textarea>
            </div>
        </div>
    </div>
</div>
