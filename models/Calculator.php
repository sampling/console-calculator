<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * 
 */
class Calculator 
{

    // Name of input file with operations
    private $fileName;
    
    // OperationsFile object
    private $operationsFile;
 
   // Operations supported by Calculator
    private $supportedOperations = array();
  
    public function __construct($fileName = '', $operations = array('SUM', 'MIN', 'MAX', 'AVERAGE')) 
    {
        $this->setFileName($fileName);
        $this->operationsFile = new OperationsInputFile($fileName);
        $this->setSupportedOperations($operations);
    }
       
    public function setFileName($fileName) 
    {
        $this->fileName = $fileName;        
    }        

    public function getFileName() 
    {
        return $this->fileName;
    }
    
    public function setSupportedOperations($operations) 
    {
        if (is_array($operations)) {
            foreach ($operations as $operation) {
                if (!method_exists($this, 'operation' . ucfirst(strtolower($operation)))) {
                    throw new InvalidArgumentException(
                        'Operation "' . $operation . '" is not supported.'
                        );
                }
            }
            $this->supportedOperations = $operations;
           // $this->operationsFile->setSupportedOperations($operations);
         }
    }        

    public function getSupportedOperations() 
    {
        return $this->supportedOperations;
    }
    
    /*
     * Process input, operation by operation
     *
     * @return int number of succesfully processed operations
     * @throws      
     */
    public function processInput() 
    {
        while (($operation = $this->operationsFile->parseNextOperationFromInput()) !== false) {
            $func = 'operation' . ucfirst(strtolower($operation->getName()));
            $result = $this->$func($operation->getValues());
            print $operation->getName() . ': ' . $result . "\n";
         }
    }

    
    public function operationSum($values) {
        return array_sum($values);
    }

    public function operationMin($values) {
        return min($values);
    }
    
    public function operationMax($values) {
        return max($values);
    }
    
    public function operationAverage($values) {
        return array_sum($values)/count($values);
    }
}