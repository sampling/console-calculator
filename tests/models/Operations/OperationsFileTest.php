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

}

?>