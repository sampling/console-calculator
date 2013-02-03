<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 * 
 */
class CalculatorOperation 
{
    public $name;
    public $values = array();
    
    public function __construct($name, $values) {
        $this->name = $name;
        $this->values = array_filter($values, 'CalculatorOperation::validateValues');
    }
    
    public static function validateValues($value) {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('Value not correct: ' . $value);
        }
        return true;
    }
}
