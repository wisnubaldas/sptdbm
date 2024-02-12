<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSearch extends Component
{
    public $pdf;
    public $excel;

    public $action;
    public $method;
    /**
     * Create a new component instance.
     */
    public function __construct($action,$method, $excel=null,$pdf=null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->excel = $excel;
        $this->pdf = $pdf;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-search');
    }
}
