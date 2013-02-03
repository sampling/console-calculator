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
    
    public function processInput() {    
        $this->operationsFile->parseInput();
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
    
    public function operationSum($inputData) {
    }

    public function operationMin($inputData) {
    }
    
    public function operationMax($inputData) {
    }
    
    public function operationAverage($inputData) {
    }
}
?>