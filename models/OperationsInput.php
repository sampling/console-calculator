<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * 
 */
abstract class OperationsInput 
{
    // string inputType 
    private $inputType;
    
    private $input;
        
    private $operationsCounter;

    public function __construct($input) 
    {
        $this->validateInput($input);
        $this->setInput($input);
        $this->operationsCounter = 0;
    }
    
    abstract public function validateInput($input);
    
    abstract public function getNextOperationFromInput();
        
    /*
     * Parse input, operation by operation
     *
     * @return array array of parsed operations
     * @throws      
     */
    public function parseInput() 
    {
        $operations = array();
        while (($operation = $this->parseNextOperationFromInput()) !== false) {
            $operations[] = $operation;
        }
        return $operations;
    } 
    
    /*
     * Parse and return next operation from input
     *
     * @return CalculatorOperation
     */
    public function parseNextOperationFromInput() 
    {
        if (($operation = $this->getNextOperationFromInput()) !== false) {
            if (($op = $this->parseOperation($operation)) !== false) {
                $this->operationsCounter++;
                return $op;
            }
        }
        return false;
    }

     /*
     * Parse operation from input
     *
     * @return CalculatorOperation
     * @throws InvalidArgumentException
     */
    public function parseOperation($operation) 
    {
        $operationNameEnd = strpos($operation, ':');
        if ($operationNameEnd !== false) {
            $operationName = substr($operation, 0, $operationNameEnd);
            // check is operation supported
            if (in_array($operationName, Calculator::getSupportedOperations())) {
                $op = new CalculatorOperation(
                    $operationName, 
                    explode(',', substr($operation, $operationNameEnd + 1))
                ); 
                return $op;
            } else {
                throw new InvalidArgumentException('Operation "' . $operationName . '" is not supported.');
            }
        }
        return false;
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

    public function getOperationsCounter() 
    {
        return $this->operationsCounter;
    }

}