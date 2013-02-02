<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * 
 */
abstract class OperationsInput 
{
    private $inputType;
    
    private $input;

    public function __construct($input) {
        $this->setInput($input);
        $this->validateInput();
    }
    
    public function setInputType($type) {
        $this->inputType = $type;
    }    

    public function getInputType() {
        return $this->inputType;
    }        
     
    abstract public function setInput($input);
    
    abstract public function validateInput();

}