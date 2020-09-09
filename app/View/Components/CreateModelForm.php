<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateModelForm extends Component
{
    // Variables
    public $id;
    public $modalTitle;
    public $textName;
    public $textareaName;
    public $textNamePH;
    public $textareaNamePH;
    public $modelName;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct
    (
        $id, $modalTitle, $textName, $textareaName, $textNamePH, $textareaNamePH, $modelName, $route
    )
    {
        $this->id               = $id;
        $this->modalTitle       = $modalTitle;
        $this->textName         = $textName;
        $this->textareaName     = $textareaName;
        $this->textNamePH       = $textNamePH;
        $this->textareaNamePH   = $textareaNamePH;
        $this->modelName        = $modelName;
        $this->route            = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.create-model-form');
    }
}
