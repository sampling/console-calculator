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
    private $supportedOperations = array('SUM', 'MIN', 'MAX', 'AVERAGE');
  
    public function __construct($fileName = '') 
    {
        $this->setFileName($fileName);
        $this->operationsFile = new OperationsFile($fileName);
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
            $this->supportedOperations = $operations;
            $this->operationsFile->setSupportedOperations($operations);
         }
    }        

    public function getSupportedOperations() 
    {
        return $this->supportedOperations;
    }

}
?>