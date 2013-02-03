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
            
    private $supportedOperations = array('SUM', 'MIN', 'MAX', 'AVERAGE');
    
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
    public function parseInput() 
    {
        while (($operation = $this->getNextOperationFromInput()) !== false) {
            if ($this->parseOperation($operation)) {
                $this->operationsCounter++;
            }
        }
        return $this->operationsCounter;
    }

    public function parseOperation($operation) 
    {
        $operationNameEnd = strpos($operation, ':');
        if ($operationNameEnd !== false) {
            $operationName = substr($operation, 0, $operationNameEnd);
            if (in_array($operationName, $this->supportedOperations)) {
                $op = new CalculatorOperation(
                    $operationName, 
                    explode(',', substr($operation, $operationNameEnd + 1))
                ); 
                return $op;
            }
        }
        return false;
    }
    
    public function validateOperation($operation) {
       return !preg_match('/[^A-Z0-9,:\\s]/', $operation);
    }
    
    abstract public function validateInput($input);
    
    abstract public function getNextOperationFromInput();

}