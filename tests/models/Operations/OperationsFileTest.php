<?php
/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * PHPUnit test suite configuration at /tests/phpunit.xml
 * 
 */
class OperationsFileTest extends PHPUnit_Framework_TestCase
{
    protected $file;
    
    /**
     * @requires PHP 5
     * @expectedException InvalidArgumentException
     */
    public function testCreateOperationsFileWithoutFilename() {
         $this->operationsFile = new OperationsFile();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateOperationsFileWithIncorrectFilename() {
        $this->operationsFile = new OperationsFile('xyz');
    }
    
    public function testCreateOperationsFileWithCorrectFilename() {
        $this->operationsFile = new OperationsFile('fixtures/inputEmpty.txt');
        $this->assertInstanceOf('OperationsFile', $this->operationsFile);
    }

    public function testProcessEmptyOperationsFile() {
        $this->operationsFile = new OperationsFile('fixtures/inputEmpty.txt');
        $operationsProcessed = $this->operationsFile->processInput();
        
        $this->assertInstanceOf('OperationsFile', $this->operationsFile);
        $this->assertEquals(0, $operationsProcessed);
    }
    
    public function testProcessCorrectOperationsFile() {
        $this->operationsFile = new OperationsFile('fixtures/inputSimple.txt');
        $operationsProcessed = $this->operationsFile->processInput();
        
        $this->assertInstanceOf('OperationsFile', $this->operationsFile);
        $this->assertEquals(3, $operationsProcessed);
    }
}

?>