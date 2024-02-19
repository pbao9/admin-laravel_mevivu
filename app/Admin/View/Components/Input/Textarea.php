<?php

namespace App\Admin\View\Components\Input;

class Textarea extends Input
{
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $value = '', $required = false)
    {
        //
        parent::__construct($type, $required);
        
        $this->required = $required;
        $this->type = $type;
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.textarea');
    }
}
