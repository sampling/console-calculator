<?php
/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * PHPUnit test suite configuration at /tests/phpunit.xml
 * 
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $calculator;

    public function setupLongLinesFile($lines) {
        $fw = fopen('fixtures/inputRandomLong.txt', 'w+');
        $opts = array('SUM', 'MIN', 'MAX', 'AVERAGE');
        
        for ($j = 0; $j < $lines; $j++) {
            $line = $opts[array_rand($opts)] . ': ' . rand(0, PHP_INT_MAX);
            
            $number_of_args = 2000;//rand(0, PHP_INT_MAX);
            for ($i = 0; $i < $number_of_args; $i++) {
               $line .= ', ' . rand(0, PHP_INT_MAX);
            }
            $line .= PHP_EOL;
            fwrite($fw, $line);
        }
        fclose($fw);
    }
    
    /**
     * @requires PHP 5
     * @expectedException InvalidArgumentException
     */
    public function testCreateCalculatorWithoutFilename() {
        $this->calculator = new Calculator();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateCalculatorWithIncorrectFilename() {
        $this->calculator = new Calculator('xyz');
    }
    
    public function testCreateCalculatorWithCorrectFilename() {
        $this->calculator = new Calculator('fixtures/inputEmpty.txt');
        $this->assertInstanceOf('Calculator', $this->calculator);
    }
    
    public function testTestCalculatorWithSimpleInput() {
        $this->calculator = new Calculator('fixtures/inputSimple.txt');
        $this->calculator->processInput();
        
        $this->assertInstanceOf('Calculator', $this->calculator);
    }

    public function testTestCalculator10LongLines() {
        $this->setupLongLinesFile(1000);
        $this->calculator = new Calculator('fixtures/inputRandomLong.txt');
        $this->calculator->processInput();
        
        $this->assertInstanceOf('Calculator', $this->calculator);
    }

}