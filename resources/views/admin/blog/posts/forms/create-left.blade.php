<div class="col-12 col-md-9">
    <div class="row">
        <!-- title -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('title')</label>
                <x-input name="title" :value="old('title')" :required="true" :placeholder="__('title')" />
            </div>
        </div>

        <!-- content -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('content')</label>
                <textarea name="content" class="ckeditor visually-hidden">{{ old('content') }}</textarea>
            </div>
        </div>
        <!-- excerpt -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('excerpt')</label>
                {{-- <textarea class="form-control" name="excerpt" rows="5">{{ old('excerpt') }}</textarea> --}}
                <textarea name="excerpt" class="ckeditor visually-hidden">{{ old('excerpt') }}</textarea>
            </div>
        </div>
    </div>
</div>
