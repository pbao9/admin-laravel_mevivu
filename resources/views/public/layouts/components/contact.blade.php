<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="hr-text">
            <span class="title-section">@lang('Liên hệ')</span>
        </div>
        <span class="text-center mb-3">@lang('Luôn sẵn sáng hỗ trợ và tư vấn cho bạn để có sản phẩm tốt nhất.')</span>
        <div class="row flex-column align-items-center">
            <x-form :action="route('contact_form.store')" class="col-md-6 col-11" type="post" :validate="true">
                <div class="mb-3">
                    <x-input-phone name="customer_phone" class="shadow-none" :required="true" />
                </div>
                <div class="mb-3">
                    <x-textarea name="customer_msg" class="shadow-none" rows="5" :placeholder="trans('Nhập nội dung tư vấn')"></x-textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">@lang('Gửi')</button>
                </div>
            </x-form>
        </div>
    </div>
</div>
