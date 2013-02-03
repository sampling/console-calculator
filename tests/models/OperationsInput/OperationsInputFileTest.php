<?php
/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * PHPUnit test suite configuration at /tests/phpunit.xml
 * 
 */
class OperationsInputFileTest extends PHPUnit_Framework_TestCase
{
    protected $file;
    
    /**
     * @requires PHP 5
     * @expectedException InvalidArgumentException
     */
    public function testCreateOperationsFileWithoutFilename() {
         $this->operationsFile = new OperationsInputFile();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateOperationsFileWithIncorrectFilename() {
        $this->operationsFile = new OperationsInputFile('xyz');
    }
    
    public function testCreateOperationsFileWithCorrectFilename() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputEmpty.txt');
        $this->assertInstanceOf('OperationsInputFile', $this->operationsFile);
    }

    public function testProcessEmptyOperationsInputFile() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputEmpty.txt');
        $operationsProcessed = $this->operationsFile->parseInput();
        
        $this->assertInstanceOf('OperationsInputFile', $this->operationsFile);
        $this->assertEquals(0, $operationsProcessed);
    }
    
    public function testProcessCorrectOperationsInputFile() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputSimple.txt');
        $operationsProcessed = $this->operationsFile->parseInput();
        
        $this->assertInstanceOf('OperationsInputFile', $this->operationsFile);
        $this->assertEquals(3, $operationsProcessed);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testProcessOperationsFileIncorrectCharacters() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputIncorrectCharacters.txt');
        $operationsProcessed = $this->operationsFile->parseInput();
    }
}

?>