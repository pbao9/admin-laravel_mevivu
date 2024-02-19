<?php

namespace App\Admin\View\Components\Input;

class InputPrependedText extends Input
{
    public $value;

    public $pText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pText = '', $value = '', $required = false)
    {
        //
        parent::__construct('text', $required);
        $this->pText = str()->finish($pText, '/');
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.prepended-text');
    }
}
