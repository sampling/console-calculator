<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * 
 */
class OperationsFile extends OperationsInput
{

    public function __construct($fileName = null) {
        $this->setInputType('file');
        self::validateFileName($fileName);
        parent::__construct($fileName);
    }

    public static function validateFileName($fileName) 
    {
        if (is_string($fileName) && is_file($fileName)) {
            return true;
        } else {
            throw new InvalidArgumentException(
                'Incorrect input file name provided!');
        }
    }
    
    public function setInput($fileName) 
    {
        $this->input = file($fileName);
    }
    
    
        
    /*
     * Validates file content.
     *
     * @param string file content
     * @returns bool 
     */
    public function validateInput() 
    {
        if (is_array($this->input)) {
            foreach ($this->input as $line) {
                $this->validateLine($line);
            }
        } else {
            throw new InvalidArgumentException(
                'Provided input file is not valid (wrong format)!');
        }
    }
    
     /*
     * Validates operation line
     *
     * @param string operatuon file line; expected format:
     *       <operation|SUM,MIN,MAX,AVG> <int>, <int>, (<int>...)
     *
     * @returns bool 
     */
    public function validateLine($operationLine) 
    {
        if (is_string($operationLine)) {
            return true;
        } else {
            throw new InvalidArgumentException(
                'Provided input file is not valid (wrong format)!');
        }
    }

} 