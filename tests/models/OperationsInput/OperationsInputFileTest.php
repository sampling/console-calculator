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
        $this->assertEquals(0, count($operationsProcessed));
    }
    
    public function testProcessCorrectOperationsInputFile() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputSimple.txt');
        $operationsProcessed = $this->operationsFile->parseInput();
        
        $this->assertInstanceOf('OperationsInputFile', $this->operationsFile);
        $this->assertEquals(3, count($operationsProcessed));
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testProcessOperationsFileIncorrectCharacters() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputIncorrectCharacters.txt');
        $operationsProcessed = $this->operationsFile->parseInput();
    }

    public function testProcessOperationsFileIncorrectValue() {
        $this->operationsFile = new OperationsInputFile('fixtures/inputIncorrectValue.txt');
        $errorCounter = 0;
        while(($operation = $this->operationsFile->getNextOperationFromInput()) !== false) {
            try {
                $this->operationsFile->parseOperation($operation);
            } catch(InvalidArgumentException $e) {
                $errorCounter++;
            }
        }
        $this->assertEquals(3, $errorCounter);
    }

    
    public function testTestCalculator10LongLines() {
        $this->operationsFile = new OperationsInputFile($this->setupTestFile(20, 10));
        $this->operationsFile->parseInput();
        
        $this->assertInstanceOf('OperationsInputFile', $this->operationsFile);
    }
    
    /*
     * Creates random correct operations file in /tests/fixtures dir
     * @return string $fileName
     */
    public function setupTestFile($linesNo = 200, $valuesNo = 200, $fileName = 'inputRandomLong.txt') {
        $fw = fopen('fixtures/' . $fileName, 'w+');
        $opts = array('SUM', 'MIN', 'MAX', 'AVERAGE');
        
        for ($j = 0; $j < $linesNo; $j++) {
            $line = $opts[array_rand($opts)] . ': ' . (5* PHP_INT_MAX + 5); //rand(0, PHP_INT_MAX);
            
            for ($i = 0; $i < $valuesNo - 1; $i++) {
               $line .= ', ' . rand(0, PHP_INT_MAX);
            }
            $line .= PHP_EOL;
            fwrite($fw, $line);
        }
        fclose($fw);
        return 'fixtures/' . $fileName;
    }

}

?>