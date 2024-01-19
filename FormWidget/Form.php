<?php

class Form extends htmlElement {
    protected $action;
    protected $method;

    public function __construct($action='', $method='get'){
        $this->action = $action;
        $this->method = $method;
    }


    protected array $elements = [];

    public function addElement(htmlElement $el){
        $this->elements[] = $el;
    }

    public function render() : string {
        $content = implode(PHP_EOL, array_map(fn($el) => $el->render(), $this->elements));
        return sprintf('<form action = "%s" method="%s">%s</form>', $this->action, $this->method, $content);
    }
}