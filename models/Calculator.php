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
    private static $supportedOperations = array('SUM', 'MIN', 'MAX', 'AVERAGE');

    // bool Only int values accepted
    private static $intOnly;
    
    public function __construct($fileName = '') 
    {
        $this->setFileName($fileName);
        $this->operationsFile = new OperationsInputFile($fileName);
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
           
            $this->printOutput($operation->getName(), $result);
         }
    }

    /*
     * Output to STDOUT
     *
     * @param string operationName 
     * @param number result
     */
    public function printOutput($operationName, $result) 
    {
         print $operationName . ': ' . trim($result) . PHP_EOL;
    }
    
    /*
     * Return sum of values
     *
     * @param array values
     * @return int sum
     */
    public function operationSum($values) {
        return array_sum($values);
    }

    /*
     * Return min of values
     *
     * @param array values
     * @return int min
     */
    public function operationMin($values) {
        return min($values);
    }

    /*
     * Return max of values
     *
     * @param array values
     * @return int max
     */    
    public function operationMax($values) {
        return max($values);
    }
    
    /*
     * Return avg of values
     *
     * @param array values
     * @return float avg
     */
    public function operationAverage($values) {
        return array_sum($values)/count($values);
    }
    
    public function setFileName($fileName) 
    {
        $this->fileName = $fileName;        
    }        

    public function getFileName() 
    {
        return $this->fileName;
    }
    
    /*
     * Sets list of SupportedOperations.
     * Each operation needs a method in this class: 
     *      operationName($values)   e.g. operationSum($values)
     */
    public static function setSupportedOperations($operations) 
    {
        if (is_array($operations)) {
            foreach ($operations as $operation) {
                if (!method_exists('Calculator', 'operation' . ucfirst(strtolower($operation)))) {
                    throw new InvalidArgumentException(
                        'Operation "' . $operation . '" is not supported.'
                        );
                }
            }
            self::$supportedOperations = $operations;
         }
    }        

    public static function getSupportedOperations() 
    {
        return self::$supportedOperations;
    }

    public static function setIntOnly($intOnly) 
    {
        self::$intOnly = $intOnly;     
    }        

    public function isIntOnly() 
    {
        return self::$intOnly;
    }
    
}