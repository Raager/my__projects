<?php

abstract class BaseInput extends htmlElement{
    protected $name;
    protected $label;
    protected $value;

    public function __construct(string $name, string $label='', string $value=''){
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }
    
    public function render() : string {
        return sprintf('<div>
        <label>%s</label>
        %s
        </div>', $this->label, $this->renderInput());
    }

    abstract function renderInput() : string;


}