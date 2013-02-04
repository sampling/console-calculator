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
        $this->values = CalculatorOperation::validateValues($values); // removed array_walk as it throws Warning with Exception
    }

    public function getName() {
        return $this->name;
    }
    
    public function getValues() {
        return $this->values;
    }
    
    /**
     * Validates values from array
     * @return array values if all correct
     * @throw InvalidArgumentException when value incorrect
     */
    public static function validateValues($values) {
        foreach ($values as $value) {
            if (Calculator::isIntOnly() && !preg_match('/^-?[0-9]+$/', trim($value))) {
                throw new InvalidArgumentException('Value not correct: ' . $value . '. Integer expected!');
            }elseif (!is_numeric($value)) {
                throw new InvalidArgumentException('Value not correct: ' . $value . '. Number expected!');
            }
        }
        return $values;
    }
}
