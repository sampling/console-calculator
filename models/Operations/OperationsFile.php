<?php

/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * 
 */
class OperationsFile extends OperationsInput
{
    private $fileHandle;

    public function __construct($fileName = null) {
        $this->setInputType('file');
        parent::__construct($fileName);
        
        $this->setFileHandle($fileName);
    }
    
    
    public function setFileHandle($fileName) 
    {
        $this->fileHandle = fopen($fileName, 'r');
    }

    /*
     * Basic input file name validation, is file readable?.
     *
     * @param string file name
     * @return bool 
     * @throw InvalidArgumentException
     */
    public function validateInput($fileName) 
    {
        if (is_string($fileName) && is_file($fileName) && is_readable($fileName)) {
            return true;
        } else {
            throw new InvalidArgumentException(
                'Incorrect input file name provided, file can not be read: ' . $fileName);
        }
    }

    public function getNextOperationFromInput() 
    {
        if (!feof($this->fileHandle)) {
            $line = fgets($this->fileHandle, 102400);
            return $line;
        } else {
            return false;
        }
    }    

} 