<?php

class PasswordInput extends BaseInput {

    public function renderInput(): string
    {
        return sprintf('<input name="%s" type = "password" value = "%s">' ,$this->name, $this->value);
    }
}