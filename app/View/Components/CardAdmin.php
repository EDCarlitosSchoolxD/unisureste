<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardAdmin extends Component
{
    public $titulo;
    public $descripcion;
    public $href;

    /**
     * Create a new component instance.
     */
    public function __construct($titulo,$descripcion,$href="/admin")
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-admin');
    }
}
