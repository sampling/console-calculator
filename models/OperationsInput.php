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
    
    private $operationsCounter;

    public function __construct($input) 
    {
        $this->validateInput($input);
        $this->setInput($input);
        $this->operationsCounter = 0;
    }
    
    public function setInputType($type) 
    {
        $this->inputType = $type;
    }    

    public function getInputType() 
    {
        return $this->inputType;
    }        
     
    public function setInput($input) 
    {
        $this->input = $input;
    }

    public function getInput() 
    {
        return $this->input;
    }
    
    /*
     * Process input, operation by operation
     *
     * @return int number of succesfully processed operations
     * @throws      
     */
    public function processInput() 
    {
        while (($operation = $this->getNextOperationFromInput()) !== false) {
            $this->processOperation($operation);
            $this->operationsCounter++;
        }
        return $this->operationsCounter;
    }

    public function processOperation($operation) 
    {

    }
    
    abstract public function validateInput($input);
    
    abstract public function getNextOperationFromInput();

}