<div class="input-group input-group-flat">
    <span class="input-group-text">
        {{ $pText }}
    </span>
    <input type="text" {{ $attributes->class(['form-control', 'ps-0'])->merge($isRequired()) }} value="{{ $value }}" autocomplete="off">
</div>