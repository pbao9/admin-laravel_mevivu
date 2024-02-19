<input type="text" 
{{ $attributes
    ->class(['form-control'])
    ->merge([
        'data-parsley-type' => 'number',
        'data-parsley-number-message' => __("msgValidateNumber"),
    ])->merge($isRequired())
}}>