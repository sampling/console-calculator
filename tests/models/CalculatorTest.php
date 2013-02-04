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
        $expectedOutput = 'SUM: 6' . PHP_EOL .
                          'MIN: 2' . PHP_EOL .
                          'AVERAGE: 2' . PHP_EOL;
       
        $this->calculator->processInput();
              
        $this->assertInstanceOf('Calculator', $this->calculator);
        $this->expectOutputString($expectedOutput);
    }
    
    // @wip Add more edge cases and expected Output
    public function testTestCalculatorWithEdgeCasesInput() {
        $this->calculator = new Calculator('fixtures/inputEdgeCases.txt');
        
        $this->calculator->processInput();        
        $this->expectOutputString($expectedOutput);
    }
}
