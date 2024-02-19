<input type="password" 
{{ $attributes
    ->class(['form-control'])
    ->merge([
        'placeholder' => __('password')
    ])->merge($isRequired())
}}>