<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InputModal extends Component
{
    /**
     * Create a new component instance.
     */
    public string $name;
    public string $type;
    public string $value;
    public string $placeholder;

    public function __construct( string $name, string $type, string $placeholder , string $value = "" )
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value  = $value ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-modal');
    }
}
