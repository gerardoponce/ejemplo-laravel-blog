<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateModelForm extends Component
{
    // Variables
    public $id;
    public $method;
    public $buttonName;
    public $modalTitle;
    public $textName;
    public $textareaName;
    public $textNamePH;
    public $textareaNamePH;
    public $modelName;
    public $route;
    public $className;
    public $valueName;
    public $descriptionValue;
    public $image_path;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct
    (
        $id, $method, $buttonName, $modalTitle, $textName, $textareaName, $textNamePH, $textareaNamePH, $modelName, $route, $className, $valueName = Null, $descriptionValue = Null, $image_path = null
    )
    {
        $this->id               = $id;
        $this->method           = $method;
        $this->buttonName       = $buttonName;
        $this->modalTitle       = $modalTitle;
        $this->textName         = $textName;
        $this->textareaName     = $textareaName;
        $this->textNamePH       = $textNamePH;
        $this->textareaNamePH   = $textareaNamePH;
        $this->modelName        = $modelName;
        $this->route            = $route;
        $this->className        = $className;
        $this->valueName        = $valueName;
        $this->descriptionValue = $descriptionValue;
        $this->image_path       = $image_path;
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
