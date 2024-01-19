<?php

class TextInput extends BaseInput {
    
    public function renderInput(): string
    {
        return sprintf('<input name="%s" type = "text" value = "%s">' ,$this->name, $this->value);
    }

}