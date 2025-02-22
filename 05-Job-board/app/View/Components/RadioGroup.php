<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options,
        public ?bool $allOptions = true,
        public ?string $value = null,
    )
    {
        //
    }

    public function optionWithLabels(){
        return array_is_list($this->options)
            ? array_combine($this->options, $this->options) // Esto es para que el array sea asociativo
            : $this->options; // Si ya es asociativo, no hacemos nada
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
