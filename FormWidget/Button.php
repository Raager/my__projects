<?php

class Button extends htmlElement {
    protected $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return sprintf('<button>%s</button>', $this->text);
    }
}