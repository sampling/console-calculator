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
    protected $fileName;
    
    // OperationsFile object
    protected $operationsFile;
    
    public function __construct($fileName = '') 
    {
        $this->setFileName($fileName);
        $this->operationsFile = new OperationsFile($fileName);
    }
    
    public function setFileName($fileName) 
    {
        if (OperationsFile::validateFileName($fileName)) {
            return $this->fileName;
        }
    }        

    public function getFileName() 
    {
        return $this->fileName;
    }

                    

}
?>